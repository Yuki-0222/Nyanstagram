<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $fillable = ['description', 'user_id', 'image'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function like_users()
    {
        return $this->belongsToMany(User::class, 'likes', 'photo_id', 'user_id');
    }
    
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
