<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class H411 extends Model
{
    protected $table = 'h411s';
    protected $primaryKey = 'h411RecordId';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */   
    protected $fillable = [
        'pHIRegNo', 'pHIRange', 'mOHNotifyNo', 'mOHArea', 'mOHRegNo', 'diseaseNotified', 'dateNotified', 'diseaseConfirmed', 'dateConfirmed', 'firstName', 'lastName', 'birthDate', 'birthYear', 'age', 'gender', 'addLine1', 'addLine2', 'gSDivName', 'gSDiv', 'dSDiv', 'district', 'province', 'addMOHArea', 'addPHIRange', 'ethnicGroup', 'dateOnset', 'dateHospitalisation', 'dateDischarge', 'hospitalName', 'movement', 'outcome', 'whereIsolated', 'labFinding', 'firstNameHousehold1', 'lastNameHousehold1', 'ageHousehold1', 'dateSeenHousehold1', 'observationHousehold1', 'firstNameHousehold2', 'lastNameHousehold2', 'ageHousehold2', 'dateSeenHousehold2', 'observationHousehold2', 'firstNameOther1', 'lastNameOther1', 'ageOther1', 'dateSeenOther1', 'observationOther1', 'firstNameOther2', 'lastNameOther2', 'ageOther2', 'dateSeenOther2', 'observationOther2', 'symptomsDevelopment', 'treatmentType', 'complications', 'infectionSource', 'sourceReduction', 'bioControl', 'habitatModification', 'otherControl', 'removeGabage', 'removeWaterStore', 'useMosquitoNet', 'useInsectRepellent', 'otherPrevent', 'followUp',
    ];
}
