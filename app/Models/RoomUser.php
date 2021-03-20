<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomUser extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'room_id', 'finalized'
    ];

    /**
     * Get the room that owns the room_user.
     */
    public function room()
    {
        return $this->belongsTo('App\Models\Room');
    }

    /**
     * Get the user that owns the room.
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
