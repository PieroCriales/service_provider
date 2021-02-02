<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'service_id', 'body'
    ];

    /**
     * Get the service that owns the post.
     */
    public function service()
    {
        return $this->belongsTo('App\Models\Service');
    }

    /**
     * Get the user that owns the post.
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    /**
     * Get the comment associated with the post
     */
    public function comments()
    {
        return $this->hasMany('App\Models\Comment');
    }

    /**
     * Get the likes associated with the post
     */

    public function likes(){
        return $this->hasMany('App\Models\Like');
    }
}
