<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $table = 'patients';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */   
    protected $fillable = [
        'paId', 'userId', 'institute', 'insName', 'firstName', 'lastName', 'nickName', 'nICNum', 'gender', 'birthDate', 'birthYear', 'age', 'nextOfKinFirstName', 'nextOfKinLastName', 'guardian', 'guardianFirstName', 'guardianLastName', 'ethnicGroup', 'resAddLine1', 'resAddLine2', 'resGsDivName', 'resGsDiv', 'resDsDiv', 'resDistrict', 'resProvince', 'resMohArea', 'resPhiRange', 'resLandmark', 'sameAddress', 'curAddLine1', 'curAddLine2', 'curGsDivName', 'curGsDiv', 'curDsDiv', 'curDistrict', 'curProvince', 'curMohArea', 'curPhiRange', 'curLandmark', 'contactNoMobile', 'contactNoHome', 'visitArea',
    ];
}
