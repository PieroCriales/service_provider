<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id','type_service_id','title', 'description', 'price', 'picture'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function type_service()
    {
        return $this->belongsTo('App\Models\TypeService');
    }

    /**
     * Set the scope search
     */
    public function scopeSearch($query,$search){
        if($search){
            return $query->where  ('title','LIKE',"%$search%")
                ->orWhere('description','LIKE',"%$search%");
        }
    }

    /**
     * Get the posts for the service.
     */
    public function posts()
    {
        return $this->hasMany('App\Models\Post');
    }

    /**
     * Get the purchases for the service
     */
    public function purchases()
    {
        return $this->hasMany('App\Models\Purchase');
    }
}
