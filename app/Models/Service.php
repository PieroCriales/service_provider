<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'title', 'description', 'price', 'picture'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
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
}
