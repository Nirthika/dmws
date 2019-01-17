<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $table = 'patients';
    protected $primaryKey = 'paId';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */   
    protected $fillable = [
        'userId', 'institute', 'insName', 'firstName', 'lastName', 'nickName', 'nICNum', 'gender', 'birthDate', 'birthYear', 'age', 'nextOfKinFirstName', 'nextOfKinLastName', 'guardian', 'guardianFirstName', 'guardianLastName', 'ethnicGroup', 'resAddLine1', 'resAddLine2', 'resGSDivName', 'resGSDiv', 'resDSDiv', 'resDistrict', 'resProvince', 'resMOHArea', 'resPHIRange', 'resLandmark', 'sameAddress', 'curAddLine1', 'curAddLine2', 'curGSDivName', 'curGSDiv', 'curDSDiv', 'curDistrict', 'curProvince', 'curMOHArea', 'curPHIRange', 'curLandmark', 'contactNoMobile', 'contactNoHome', 'visitArea',
    ];
}
