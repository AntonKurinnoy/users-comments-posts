<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'post_id', 'commentator_id', 'content',
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'commentator_id');
    }

    public function post()
    {
        return $this->belongsTo('App\Models\Comment', 'post_id');
    }
}
