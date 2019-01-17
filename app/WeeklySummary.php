<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WeeklySummary extends Model
{
    protected $table = 'weeklySummarys';
    // protected $primaryKey = array('h399RecordId', 'summary');

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */   
    protected $fillable = [
        'h399RecordId', 'summary', 'internationallyNotifiableDiseases', 'acutePoliomyelitis', 'chickenPox', 'dengueFever', 'diphtheria', 'dysentery', 'encephalitis', 'entericFever', 'foodPoisoning', 'humanRabies', 'leishmaniasis', 'leprosy', 'leptospirosis', 'malaria', 'neasles', 'meningities', 'mumps', 'neonatalTetanus', 'rubella', 'simpleConFever', 'tetanus', 'tuberculosis', 'typhusFever', 'viralHepatitis', 'whoopingCough',
    ];
}
