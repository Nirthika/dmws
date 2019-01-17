<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MOHInDistrict extends Model
{
    protected $table = 'mOHInDistricts';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
   
    protected $fillable = [
        'mOHArea', 'district',
    ];
}
