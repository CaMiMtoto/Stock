<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property \Illuminate\Support\Carbon system_date
 */
class Setting extends Model
{
    protected $casts = [
        "system_date" => 'datetime'
    ];


    public static function getSystemDate(){
        return Setting::first()->system_date?? now()->toDate();
    }
    public static function getSystemSetting(){
        return Setting::first();
    }
}
