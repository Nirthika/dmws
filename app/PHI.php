<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PHI extends Model
{
    protected $table = 'pHIs';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
   
    protected $fillable = [
        'userId', 'firstName', 'lastName', 'gender', 'pHIRegNo', 'pHIRange', 'addLine1', 'addLine2', 'district', 'province', 'contactNoOffice', 'contactNoMobile', 'insName',
    ];
}
