<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RDHS extends Model
{
    protected $table = 'rDHSes';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
   
    protected $fillable = [
        'userId', 'firstName', 'lastName', 'gender', 'rDHSDiv', 'addLine1', 'addLine2', 'district', 'province', 'contactNoOffice', 'contactNoMobile', 'insName',
    ];
}
