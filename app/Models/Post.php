<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'user',
        'title',
        'content',
        'date',
        'image'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
