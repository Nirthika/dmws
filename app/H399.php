<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class H399 extends Model
{
    protected $table = 'h399s';
    protected $primaryKey = 'h399RecordId';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */   
    protected $fillable = [
        'weekEndDate', 'province', 'district', 'rDHSDiv', 'mOHArea', 
    ];
}
