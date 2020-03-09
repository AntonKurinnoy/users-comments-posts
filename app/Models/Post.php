<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'author_id', 'image_id', 'content',
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'author_id');
    }
}
