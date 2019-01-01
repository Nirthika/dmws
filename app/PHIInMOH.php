<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PHIInMOH extends Model
{
    protected $table = 'pHIInMOHs';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
   
    protected $fillable = [
        'pHIRange', 'mOHArea',
    ];
}
