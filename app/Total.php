<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Total extends Model
{
    protected $table = 'totals';
    // protected $primaryKey = array('h399RecordId', 'mOHArea');

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */   
    protected $fillable = [
        'h399RecordId', 'mOHArea', 'internationallyNotifiableDiseases', 'acutePoliomyelitis', 'chickenPox', 'dengueFever', 'diphtheria', 'dysentery', 'encephalitis', 'entericFever', 'foodPoisoning', 'humanRabies', 'leishmaniasis', 'leprosy', 'leptospirosis', 'malaria', 'neasles', 'meningities', 'mumps', 'neonatalTetanus', 'rubella', 'simpleConFever', 'tetanus', 'tuberculosis', 'typhusFever', 'viralHepatitis', 'whoopingCough',
    ];
}
