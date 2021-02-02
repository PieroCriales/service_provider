<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeService extends Model
{
    use HasFactory;

    public function purchases()
    {
        return $this->hasMany('App\Models\Purchase');
    }
}
