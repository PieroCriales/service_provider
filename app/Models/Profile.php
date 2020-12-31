<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Profile extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'user_id', 'firstname', 'lastname', 'address', 'phone_number', 'profession'
    ];

    /**
     * Get the user that owns the profile.
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
