<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeRating extends Model
{
    use HasFactory;
    /**
     * Get the purchases for the service
     */
    public function purchases()
    {
        return $this->hasMany('App\Models\Purchase');
    }
}
