<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get the profile record associated with the user
     */
    public function profile()
    {
        return $this->hasOne('App\Models\Profile');
    }

    /**
     * Get the services record associated with the user
     */
    public function services()
    {
        return $this->hasMany('App\Models\Service');
    }

    /**
     * Get the posts associated with the user
     */
    public function posts()
    {
        return $this->hasMany('App\Models\Post');
    }

    /**
     * Get the comments associated with the user
     */
    public function comments()
    {
        return $this->hasMany('App\Models\Comment');
    }

    /**
     * Get the purchases for the user
     */
    public function purchases()
    {
        return $this->hasMany('App\Models\Purchase');
    }

    /**
     * Get the likes given by the user
     */

    public function likes(){
        return $this->hasMany('App\Models\Like');
    }
}
