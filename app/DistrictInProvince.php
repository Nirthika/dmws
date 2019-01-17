<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DistrictInProvince extends Model
{
    protected $table = 'districtInProvinces';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
   
    protected $fillable = [
        'district', 'province',
    ];
}
