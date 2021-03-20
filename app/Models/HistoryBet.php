<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoryBet extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'room_id', 'winner'
    ];

    /**
     * Get the room that owns the history_bet.
     */
    public function room()
    {
        return $this->belongsTo('App\Models\Room');
    }

    /**
     * Get the user that owns the history_bet.
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
