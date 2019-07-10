<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $fillable = ['comment', 'user_id', 'image'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
