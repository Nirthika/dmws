<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FieldSurvey extends Model
{
    protected $table = 'fieldSurveys';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
   
    protected $fillable = [
        'month', 'year', 'visitArea', 'waterTank', 'bottle', 'teaCup', 'coconutShell', 'flowerPot', 'yoghurtCup', 'petWaterSource', 'fridgeWasteWaterContainer', 'other', 'totalContainer', 'larvaPositive', 'containerIndex', 'aegypti', 'albopictus',
    ];
}
