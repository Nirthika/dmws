<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RDHSDivInDistrict extends Model
{
    protected $table = 'rDHSDivInDistricts';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
   
    protected $fillable = [
        'rDHSDiv', 'district',
    ];
}
