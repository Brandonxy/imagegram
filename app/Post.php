<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;

class Post extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    /**
     * Mutators and Accessors
     */

    public function getPhotoAttribute(): string 
    {
         return url('photos/' . $this->attributes['photo']);
    }
}
