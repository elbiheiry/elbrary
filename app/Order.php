<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    public function product()
    {
        return $this->belongsTo('App\Product' , 'product_id');
    }

    public function category()
    {
        return $this->belongsTo('App\ProductCategory' , 'category_id');
    }

    public function cut()
    {
        return $this->belongsTo('App\ProductCut' , 'cut_id');
    }
}
