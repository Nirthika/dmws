<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class H411a extends Model
{
    protected $table = 'h411as';
    protected $primaryKey = 'h411aRecordId';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */   
    protected $fillable = [
        'rDHSDiv', 'notifiedDisease', 'mOHArea', 'notificationDate', 'mOHRegNo', 'confirmedDisease', 'birthDate', 'birthYear', 'age', 'confirmationDate', 'gender', 'confirmedBy', 'occupation', 'sourceOfNotify', 'natureOfConf', 'officeUseOnly', 'specify',
    ];
}
