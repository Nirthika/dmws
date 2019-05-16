<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RA extends Model
{
    protected $table = 'rAs';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
   
    protected $fillable = [
        'userId', 'firstName', 'lastName', 'gender', 'addLine1', 'addLine2', 'district', 'province', 'contactNoOffice', 'contactNoMobile', 'insName',
    ];

}
