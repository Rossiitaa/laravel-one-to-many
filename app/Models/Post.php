<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = array(
        'user_id',
        'title',
        'content',
        'date',
        'image'
    );

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
