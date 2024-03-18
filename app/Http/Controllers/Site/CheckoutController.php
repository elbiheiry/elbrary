<?php

namespace App\Http\Controllers\Site;

use App\Checkout;
use App\City;
use App\Order;
use App\Product;
use App\ProductActiveDay;
use App\ProductDiscount;
use Carbon\Carbon;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Collection;

class CheckoutController extends Controller
{
    //
    public function getIndex($id)
    {
        $order = Order::find($id);
        $cities = City::all();
        $alldays = new Collection();
        $product = Product::where('id' , $order->product_id)->get()->map(function($product) use ($alldays){
            $product->days = $product->days()->exists() ? $alldays->push($this->getDays($product->id)) : [];
            return $product;
        });
        foreach ($alldays as $allday) {
            $days = $allday;
        }

        return view('site.pages.checkout.index' ,compact('order' , 'cities' ,'product' ,'days'));
    }

    protected function getDays($id){

        $days = new Collection();
        $intervals = new Collection();

        $alldays = ProductActiveDay::where('product_id', $id)->where('active' , '1')->get();
        $current_day = \Carbon\Carbon::now()->dayOfWeek != 6 ? $alldays[\Carbon\Carbon::now()->dayOfWeek + 1] : $alldays[0];
        $allintervals = \App\ActiveDayInterval::where('day_id' , $current_day->id)->get();
        $last_interval = \App\ActiveDayInterval::where('day_id' , $current_day->id)->orderBy('id' , 'DESC')->first();

        foreach ($allintervals as $interval) {
            if (Carbon::parse($interval->start)->gt(Carbon::now())){
                $intervals->push($interval);
            }
        }

        if (!Carbon::parse($last_interval->start)->gt(Carbon::now())){
            $current_day = \Carbon\Carbon::now()->dayOfWeek+1 != 6 ? $alldays[\Carbon\Carbon::now()->dayOfWeek + 2] : $alldays[0];
            $after_days = ProductActiveDay::where('id' , '>' , $current_day->id)->orderBy('id' , 'ASC')->with('intervals')->get();
            $before_days = ProductActiveDay::where('id' , '<' , $current_day->id)->orderBy('id' , 'ASC')->with('intervals')->get();
            $intervals = \App\ActiveDayInterval::where('day_id' , $current_day->id)->get();
        }else{
            $after_days = ProductActiveDay::where('id' , '>' , $current_day->id)->with('intervals')->orderBy('id' , 'ASC')->get();
            $before_days = ProductActiveDay::where('id' , '<' , $current_day->id)->with('intervals')->orderBy('id' , 'ASC')->get();
        }

        $current_day->intervals = $intervals;
        $days->push($current_day);
        foreach ($after_days as $after_day) {
            $days->push($after_day);
        }
        foreach ($before_days as $before_day) {
            $days->push($before_day);
        }

        return $days;
    }


    public function postCheckDiscount(Request $request , $id , $order_id)
    {
        $v = validator($request->all() , [
            'coupon' => 'required'
        ] ,[
            'coupon.required' => 'برجاء ادخال كوبون الخصم'
        ]);

        if ($v->fails()){
            return ['status' => 'error' , 'data' => $v->errors()->first()];
        }

        $coupon = ProductDiscount::where('product_id' , $id)->where('code' , $request->coupon)->first();
        $order = Order::find($order_id);

        if (!$coupon){
            return ['status' => 'error' , 'data' => 'كود الخصم هذا غير صالح'];
        }

        if ($coupon->type == 1){
            $order->total = $order->total - $coupon->amount;

            $order->save();
        }else{
            $order->total = $order->total - (($order->total * $coupon->amount)/100);

            $order->save();
        }

        return ['status' => 'success' , 'total' => $order->total];
    }

    public function postIntervals(Request $request)
    {
        $day = ProductActiveDay::where('id' , $request->id)->first();

        $intervals = $day->intervals()->get();

        return ['view' => view('site.pages.checkout.templates.intervals' , compact('intervals'))->render()];
    }

    public function postIndex(Request $request , $id)
    {
        $v = validator($request->all() , [
            'confirmation' => 'required',
            'payment_method' => 'required',
        ], [
            'confirmation.required' => 'برجاء اختيار طريقه تاكيد الطلب',
            'payment_method.required' => 'برجاء اختيار طريقه الدفع',
        ]);

        if ($v->fails()){
            return ['status' => 'error' , 'title' => $v->errors()->first()];
        }

        $checkout = new Checkout();

        $checkout->name = $request->name;
        $checkout->city_id = $request->city_id;
        $checkout->day_id = $request->day_id;
        $checkout->interval_id = $request->interval_id;
        $checkout->order_id = $id;
        $checkout->phone = $request->phone;
        $checkout->address = $request->address;
        $checkout->confirmation = $request->confirmation;
        $checkout->notes = $request->notes;
        $checkout->payment_method = $request->payment_method;

        if ($checkout->save()){

            $this->sendMessage($checkout);

            return ['status' => 'success','title' => 'تم اتمام الطلب بنجاح'];
        }
    }

    public function sendMessage(Checkout $checkout)
    {
        $message = 'مرحبا '.$checkout->name;
        $message.= ' لقد تم استلام طلبك رقم '.$checkout->id;
        $message.= ' والمبلغ الاجمالي هو '.$checkout->order['total'];

        $client = new Client();

        $client->request(
            'POST' ,
            'http://www.oursms.net/api/sendsms.php?username=albarari&password=albarari&message='.$message.'&numbers='.$checkout->phone.'&sender=ALBARARI&unicode=U&return='
        );

        $message2 = 'مرحبا ';
        $message2.= ' لقد تم استلام طلب جديد برقم '.$checkout->id;
        $message2.= ' ورقم هاتفه هو '.$checkout->phone;

        $client = new Client();

        $client->request(
            'POST' ,
            'http://www.oursms.net/api/sendsms.php?username=albarari&password=albarari&message='.$message2.'&numbers=00966541973828&sender=ALBARARI&unicode=U&return='
        );

    }
}
