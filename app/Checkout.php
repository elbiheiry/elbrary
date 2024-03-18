<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Checkout extends Model
{
    //
    public function order()
    {
        return $this->belongsTo('App\Order' , 'order_id');
    }

    public function city()
    {
        return $this->belongsTo('App\City' , 'city_id');
    }

    public function day()
    {
        return $this->belongsTo('App\ProductActiveDay' , 'day_id');
    }

    public function interval()
    {
        return $this->belongsTo('App\ActiveDayInterval' , 'interval_id');
    }
}
