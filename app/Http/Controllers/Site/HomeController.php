<?php

namespace App\Http\Controllers\Site;

use App\Home;
use App\Http\Requests\Site\ContactRequest;
use App\Product;
use App\Subscriber;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    //
    public function getIndex()
    {
        $homes = Home::all();
        $products = Product::take(4)->orderBy('id' , 'DESC')->get();

        return view('site.pages.index' ,compact('homes' ,'products'));
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
            return ['status' => 'error' ,'data' => implode("<br>" , $v->errors()->all())];
        }

        $subscriber = new Subscriber();

        $subscriber->email = $request->email;

        if ($subscriber->save()){
            return ['status' => 'success' ,'data' => 'شكرا لك علي التواصل معنا'];
        }

        return ['status' => 'error' ,'data' => 'خطا برجاء المحاوله لاحقا'];
    }

    public function postIndex(ContactRequest $request)
    {
        $request->store();

        return response()->json(['status' => 'success' ,'data' => 'تم ارسال رسالتك بنجاح وسيتم التواصل معاك لاحقا']);
    }
}
