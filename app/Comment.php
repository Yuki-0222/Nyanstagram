<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    
    protected $fillable = ['user_id', 'photo_id', 'comment'];

    public function photo()
    {
        return $this->belongsTo(Photo::class);    
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
