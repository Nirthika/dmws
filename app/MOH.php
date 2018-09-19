<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MOH extends Model
{
    protected $table = 'mOHs';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
   
    protected $fillable = [
        'userId', 'firstName', 'lastName', 'gender', 'mOHRegNo', 'mOHArea', 'addLine1', 'addLine2', 'district', 'province', 'contactNoOffice', 'contactNoMobile', 'insName',
    ];
}
