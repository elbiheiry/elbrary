<?php

namespace App\Http\Controllers\Api;

use App\Checkout;
use App\Feature;
use App\Home;
use App\Http\Requests\Site\ContactRequest;
use App\Order;
use App\Product;
use App\ProductActiveDay;
use App\ProductDiscount;
use App\Subscriber;
use App\Testimonial;
use Carbon\Carbon;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Artisan;

class OrderController extends Controller
{
    //
    public function getIndex()
    {
        Artisan::call('config:cache');
        Artisan::call('cache:clear');
        Artisan::call('view:clear');
        
        $products = Product::with('categories' , 'cuts' , 'accessories')->where('active',1)->get()->map(function($product){
            $product->image = asset('storage/uploads/products/'.$product->image);
            $product->days = $product->days()->exists() ? $this->getDays($product->id) : [];

            return $product;
        });

        return response()->json($products);
    }

    protected function getDays($id){

        $days = new Collection();
        $intervals = new Collection();

        $alldays = ProductActiveDay::where('product_id', $id)->where('active' , '1')->get();

        $current = isset($alldays[\Carbon\Carbon::tomorrow()->dayOfWeek]) ? $alldays[\Carbon\Carbon::tomorrow()->dayOfWeek] : $alldays[0];
        $current_day = \Carbon\Carbon::now()->dayOfWeek != sizeof($alldays) ? $current : $alldays[0];
        $allintervals = \App\ActiveDayInterval::where('day_id' , $current_day->id)->get();

        foreach ($allintervals as $interval) {
            if (Carbon::parse($interval->start)->gt(Carbon::now())){
                $intervals->push($interval);
            }
        }


        if (! Carbon::parse(\App\ActiveDayInterval::where('day_id' , $current_day->id)->orderBy('id' , 'DESC')->value('start'))->gt(Carbon::now())){

            $current_day = \Carbon\Carbon::tomorrow()->dayOfWeek != sizeof($alldays) ? $alldays[\Carbon\Carbon::tomorrow()->dayOfWeek] == $alldays[$alldays->keys()->last()] ? $alldays[0] : $alldays[\Carbon\Carbon::tomorrow()->dayOfWeek] : $alldays[0];
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

    public function getSingleProduct($slug)
    {
        $product = Product::where('slug' , $slug)->with('categories' , 'cuts' , 'accessories' , 'days.intervals')->first();

        $product->image = asset('storage/uploads/products/'.$product->image);

        return response()->json($product);
    }

    public function postSave(Request $request)
    {
        $v = validator($request->all() , [
            'amount' => 'not_in:0'
        ] , [
            'amount.not_in' => 'برجاء ادخال الكميه المطلوبه'
        ]);

        if ($v->fails()){
            return response()->json(['status' => 'error' , 'data' => $v->errors()->first()]);
        }

        $order = new Order();

        $order->product_id = $request->product_id;

        if($request->coupon){
            $coupon = ProductDiscount::where('product_id' , $request->product_id)->where('code' , $request->coupon)->first();
            if (!$coupon){
                return response()->json(['status' => 'error' , 'data' => 'كود الخصم هذا غير صالح']);
            }
        }

        $order->category_id = $request->category_id;
        $order->amount = $request->amount;
        $order->cut_id = $request->cut_id;
        $order->accessories = json_encode($request->accessories);
        $order->other_cut = json_encode($request->other_cuts);
        $order->other_price = json_encode($request->other_prices);
        $order->message = $request->message;
        $order->total = $request->total;

        if ($order->save()){
            return response()->json(['status' => 'success' , 'url' => route('api.checkout' , ['id' => $order->id])]);
        }
    }

    public function postSaveCheckout(Request $request , $id)
    {
        $v = validator($request->all() , [
            'confirmation' => 'required',
            'payment_method' => 'required',
            'name' => 'required',
            'city_id' => 'not_in:0',
            'day_id' => 'not_in:0',
            'interval_id' => 'not_in:0',
            'phone' => 'required',
            'address' => 'required'
        ], [
            'name.required' => 'برجاء ادخال الاسم بالكامل',
            'city_id.not_in' => 'برجاء اختيار المدينه الخاصه بكم ',
            'day_id.not_in' => 'برجاء اختيار يوم التوصيل',
            'interval_id.not_in' => 'برجاء اختيار الفتره المراد التوصيل بها',
            'phone.required' => 'برجاء ادهال رقم الهاتف مسبوق ب 00966',
            'address.required' => 'برجاء ادخال العنوان المراد التوصيل له',
            'confirmation.required' => 'برجاء اختيار طريقه تاكيد الطلب',
            'payment_method.required' => 'برجاء اختيار طريقه الدفع'
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
        $checkout->phone2 = $request->phone2;
        $checkout->address = $request->address;
        $checkout->confirmation = $request->confirmation;
        $checkout->notes = $request->notes;
        $checkout->payment_method = $request->payment_method;

        if ($checkout->save()){

//            $this->sendMessage($checkout);

            return response()->json(['status' => 'success','title' => 'تم اتمام الطلب بنجاح']);
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
            'http://www.oursms.net/api/sendsms.php?username=albarari&password=albarari&message='.$message.'&numbers='.$checkout->phone.'&sender=ALBARARI&unicode=E&return='
        );

        $message2 = 'مرحبا ';
        $message2.= ' لقد تم استلام طلب جديد برقم '.$checkout->id;
        $message2.= ' ورقم هاتفه هو '.$checkout->phone;

        $client = new Client();

        $client->request(
            'POST' ,
            'http://www.oursms.net/api/sendsms.php?username=albarari&password=albarari&message='.$message2.'&numbers=00966541973828&sender=ALBARARI&unicode=E&return='
        );

    }

    public function getContent()
    {
        $homes = Home::all();
        $features = Feature::all();
        $testimonials = Testimonial::all();

        return response()->json(['home_sections' => $homes , 'about_features' => $features , 'about_testimonials' => $testimonials]);
    }

    public function postSubscribe(Request $request)
    {
        $v = validator($request->all() ,[
            'email' => 'required|email|unique:subscribers'
        ] ,[
            'email.required' => 'برجاء ادخال بريدك الالكتروني',
            'email.email' => 'البريد الالكتروني غير صحيح',
            'email.unique' => 'هذا البريد الالكتروني مستخدم بالفعل'
        ]);

        if ($v->fails()){
            return response()->json(['status' => 'error' ,'data' => $v->errors()->first()]);
        }

        $subscriber = new Subscriber();

        $subscriber->email = $request->email;

        if ($subscriber->save()){
            return response()->json(['status' => 'success' ,'data' => 'شكرا لك علي التواصل معنا']);
        }

        return response()->json(['status' => 'error' ,'data' => 'خطا برجاء المحاوله لاحقا']);
    }

    public function postIndex(ContactRequest $request)
    {
        $request->store();

        return ['status' => 'success' ,'data' => 'تم ارسال رسالتك بنجاح وسيتم التواصل معاك لاحقا'];
    }

    public function getCities(){
        $cities = \App\City::all();

        return response()->json($cities);
    }
}
