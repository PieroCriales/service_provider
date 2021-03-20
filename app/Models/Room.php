<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    /**
     * Get the room_user associated with the room
     */
    public function room_users()
    {
        return $this->hasMany('App\Models\RoomUser');
    }
}
