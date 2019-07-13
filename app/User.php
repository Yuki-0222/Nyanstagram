<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public function photos()
    {
        return $this->hasMany(Photo::class);
    }
    
    public function followings()
    {
        // 第1引数：Modelクラス、第2引数：中間テーブル、第3引数：中間テーブルの自分のID、第4引数：中間テーブルの関係先のID
        return $this->belongsToMany(User::class, 'user_follow', 'user_id', 'follow_id')->withTimestamps();
    }

    public function followers()
    {
        // 第1引数：Modelクラス、第2引数：中間テーブル、第3引数：中間テーブルの自分のID、第4引数：中間テーブルの関係先のID
        return $this->belongsToMany(User::class, 'user_follow', 'follow_id', 'user_id')->withTimestamps();
    }
    
    public function follow($userId)
    {
        // 既にフォローしているかの確認
        $exist = $this->is_following($userId);
        // 相手が自分自身ではないかの確認
        $its_me = $this->id == $userId;
    
        if ($exist || $its_me) {
            // 既にフォローしていれば何もしない
            return false;
        } else {
            // 未フォローであればフォローする
            $this->followings()->attach($userId);
            return true;
        }
    }
    
    public function unfollow($userId)
    {
        // 既にフォローしているかの確認
        $exist = $this->is_following($userId);
        // 相手が自分自身ではないかの確認
        $its_me = $this->id == $userId;
    
        if ($exist && !$its_me) {
            // 既にフォローしていればフォローを外す
            $this->followings()->detach($userId);
            return true;
        } else {
            // 未フォローであれば何もしない
            return false;
        }
    }
    
    public function is_following($userId)
    {
        return $this->followings()->where('follow_id', $userId)->exists();
    }

    public function feed_photos()
    {
        $follow_user_ids = $this->followings()->pluck('users.id')->toArray();
        $follow_user_ids[] = $this->id;
        return Photo::whereIn('user_id', $follow_user_ids);
    }
    
    public function likes()
    {
        return $this->belongsToMany(Photo::class, 'likes', 'user_id', 'photo_id')->withTimestamps();
    }
    
    public function like($photoId)
    {
        // 既にいいね！しているかの確認
        $exist = $this->is_like($photoId);
        
        if ($exist) {
            // 既にいいね！なら何もしない
            return false;
        } else {
            // いいね！していなければ、いいね！する
            $this->likes()->attach($photoId);
            return true;
        }
    }
    
    public function unlike($photoId)
    {
        // 既にいいね！しているかの確認
        $exist = $this->is_like($photoId);
        
        if ($exist) {
            // 既にいいね！ならお気に入りを外す
            $this->likes()->detach($photoId);
            return true;
        } else {
            // いいね！していなければ、何もしない
            return false;
        }
    }
    
    public function is_like($photoId)
    {
        return $this->likes()->where('photo_id', $photoId)->exists();
    }
}

