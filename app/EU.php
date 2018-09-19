<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EU extends Model
{
    protected $table = 'eUs';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
   
    protected $fillable = [
        'userId', 'firstName', 'lastName', 'gender', 'eUDiv', 'addLine1', 'addLine2', 'district', 'province', 'contactNoOffice', 'contactNoMobile', 'insName',
    ];

    // public function users() {
    //     return $this->blongsTo(User::class);
    // }
}
