<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;
    protected $fillable = [
        'service_id',
        'user_id',
        'rating_id',
        'code',
        'due_date',
        'seller_confirmation',
        'customer_confirmation',
        'status'
    ];

    /**
     * Get the service for the purchase
     */
    public function service()
    {
        return $this->belongsTo('App\Models\Service');
    }

    /**
     * Get the user for the purchase
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    /**
     * Get the rating for the purchase
     */
    public function rating()
    {
        return $this->belongsTo('App\Models\Rating');
    }
}
