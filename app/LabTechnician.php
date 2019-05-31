<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LabTechnician extends Model
{
    protected $table = 'labTechnicians';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
   
    protected $fillable = [
        'userId', 'firstName', 'lastName', 'gender', 'addLine1', 'addLine2', 'district', 'province', 'contactNoOffice', 'contactNoMobile', 'insName',
    ];
}
