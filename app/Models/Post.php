<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;


     public function User()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

      public function likes()
    {
        return $this->hasMany(Like::class, 'post_id');
    }

          public function comments()
    {
        return $this->hasMany(Comment::class, 'post_id');
    }
}
