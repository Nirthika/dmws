<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GSDivInDSDiv extends Model
{
    protected $table = 'gSDivInDSDivs';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
   
    protected $fillable = [
        'gSDiv', 'gSDivName', 'dSDiv', 'latitude', 'longitude',
    ];
}
