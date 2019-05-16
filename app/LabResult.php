<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LabResult extends Model
{
    protected $table = 'labResults';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
   
    protected $fillable = [
        'admissionDate', 'bHTNo', 'paId', 'firstName', 'lastName', 'curAddLine1', 'curAddLine2', 'curGSDivName', 'curGSDiv', 'curDSDiv', 'curDistrict', 'curProvince', 'curMOHArea', 'curPHIRange', 'ns1', 'igm', 'igg', 'denv1', 'denv2', 'denv3', 'denv4'
    ];
}
