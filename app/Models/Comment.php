<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'post_id', 'body'
    ];

    /**
     * Get the user that owns the comment.
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    /**
     * Get the post that owns the comment.
     */
    public function post()
    {
        return $this->belongsTo('App\Models\Post');
    }
}
