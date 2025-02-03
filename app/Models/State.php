<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\hasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class State extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',        
    ];

     /**
     * Get The country for the state
     *
     * @return hasOne
     */
    // chidrens

}
