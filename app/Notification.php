<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $table = 'notifications';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */   
    protected $fillable = [
        'id', 'userId', 'insName', 'paId', 'diseaseGroup', 'diseaseName', 'onsetDate', 'admissionDate', 'regOrBHTNo', 'ward', 'ns1', 'igm', 'igg', 'designation',
    ];
}





