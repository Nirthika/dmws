<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    protected $table = 'doctors';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
   
    protected $fillable = [
        'userId', 'firstName', 'lastName', 'gender', 'regNo', 'designation', 'addLine1', 'addLine2', 'district', 'province', 'contactNoOffice', 'contactNoMobile', 'hospital1', 'hospital2', 'hospital3', 'hospital4', 'hospital5', 'otherHospital',
    ];
}
