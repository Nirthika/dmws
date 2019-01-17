<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jaffna extends Model
{
    protected $table = 'jaffnas';
    // protected $primaryKey = array('h399RecordId', 'pHIRange');

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */   
    protected $fillable = [
        'h399RecordId', 'pHIRange', 'internationallyNotifiableDiseases', 'acutePoliomyelitis', 'chickenPox', 'dengueFever', 'diphtheria', 'dysentery', 'encephalitis', 'entericFever', 'foodPoisoning', 'humanRabies', 'leishmaniasis', 'leprosy', 'leptospirosis', 'malaria', 'neasles', 'meningities', 'mumps', 'neonatalTetanus', 'rubella', 'simpleConFever', 'tetanus', 'tuberculosis', 'typhusFever', 'viralHepatitis', 'whoopingCough',
    ];
}
