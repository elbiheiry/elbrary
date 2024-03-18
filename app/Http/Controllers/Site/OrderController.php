<?php

namespace App\Http\Controllers\Site;

use App\Order;
use App\Product;
use App\ProductCategory;
use App\ProductCut;
use App\ProductDiscount;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    //
    public function getIndex()
    {
        $products = Product::orderBy('id' , 'DESC')->get();

        return view('site.pages.orders.index' ,compact('products'));
    }

    public function getSingleOrder($slug)
    {
        $product = Product::where('slug' , $slug)->first();

        return view('site.pages.orders.single' ,compact('product'));
    }

    public function postIndex(Request $request , $id)
    {
        $product = Product::find($id);
        $productcuts = ProductCut::where('product_id' , $id)->where('price'  , '!=' , 0 )->get();
        $total = 0;

        $amount = $request->amount;
        $cuts = $request->cuts;

        if (!$request->size){
            $total += ($amount * $product->price);
        }else{
            $size = ProductCategory::where('id' , $request->size)->first()->price;
            $total += ($size * $amount);
        }

        foreach ($cuts as $index => $cut) {
            if ($cut != null){
                $total += $productcuts[$index]->price * $cut;
            }
        }
        return ['price' => $total];
    }

    public function postSave(Request $request)
    {
        $v = validator($request->all() , [
            'amount' => 'not_in:0'
        ] , [
            'amount.not_in' => 'برجاء ادخال الكميه المطلوبه'
        ]);

        if ($v->fails()){
            return ['status' => 'error' , 'data' => $v->errors()->first()];
        }

        $order = new Order();

        $order->product_id = $request->product_id;
        $order->category_id = $request->category_id;
        $order->amount = $request->amount;
        $order->cut_id = $request->cut_id;
        $order->accessories = json_encode($request->accessories);
        $order->other_cut = json_encode($request->other_cuts);
        $order->other_price = json_encode($request->other_prices);
        $order->message = $request->message;
        $order->total = $request->total;

        if ($order->save()){
            return ['status' => 'success' , 'url' => route('site.checkout' , ['id' => $order->id])];
        }
    }
}
