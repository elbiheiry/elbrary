<?php

namespace App\Http\Controllers\Admin;

use App\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    //
    public function getIndex()
    {
        $orders = Order::orderBy('id' , 'DESC')->get();
        
        return view('admin.pages.orders.index' ,compact('orders'));
    }

    public function getSingleOrder()
    {
        
    }
}
