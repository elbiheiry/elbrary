<?php

namespace App\Http\Controllers\Admin;

use App\Checkout;
use App\Order;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CheckoutController extends Controller
{
    //
    public function getIndex()
    {
        $checkouts = Checkout::orderBy('id' , 'DESC')->paginate(30);

        return view('admin.pages.checkouts.index' ,compact('checkouts'));
    }

    public function getSingleOrder($id)
    {
        $checkout = Checkout::with('order')->find($id);

        return view('admin.pages.checkouts.single' ,compact('checkout'));
    }

    public function getDelete($id)
    {
        $checkout = Checkout::find($id);

        $order = Order::where('order_id' ,$checkout->order_id)->first();

        $checkout->delete();

        $order->delete();

        return redirect()->back();
    }
}
