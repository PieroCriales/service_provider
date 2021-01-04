<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;
    protected $fillable = [
        'type_rating_id', 'comment'
    ];

    /**
     * Get the purchases for the service
     */
    public function purchases()
    {
        return $this->hasMany('App\Models\Purchase');
    }

    /**
     * Get the type rating for the rating
     */
    public function type_rating()
    {
        return $this->belongsTo('App\Models\TypeRating');
    }
}
