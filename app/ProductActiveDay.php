<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductActiveDay extends Model
{
    //
    public function intervals()
    {
        return $this->hasMany('App\ActiveDayInterval' , 'day_id');
    }
}
