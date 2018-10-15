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
        'paId', 'userId', 'insName', 'firstName', 'lastName', 'nickName', 'gender', 'birthDate', 'yearOfBirth', 'age', 'nextOfKinFirstName', 'nextOfKinLastName', 'guardian', 'guardianFirstName', 'guardianLastName', 'ethnicGroup', 'resAddLine1', 'resAddLine2', 'resGsDivName', 'resGsDiv', 'resDsDiv', 'resDistrict', 'resProvince', 'resMohArea', 'resPhiRange', 'resLandmark', 'curAddLine1', 'curAddLine2', 'curGsDivName', 'curGsDiv', 'curDsDiv', 'curDistrict', 'curProvince', 'curMohArea', 'curPhiRange', 'curLandmark', 'contactNoMobile', 'contactNoHome', 'visitArea',
    ];
}
