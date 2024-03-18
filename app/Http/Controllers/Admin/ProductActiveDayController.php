<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\ProductActiveDayRequest;
use App\ProductActiveDay;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductActiveDayController extends Controller
{
    //
    public function getIndex($id)
    {
        $days = ProductActiveDay::where('product_id' , $id)->get();

        return view('admin.pages.products.days.index' ,compact('days' ,'id'));
    }

    public function getInfo($id)
    {
        $day = ProductActiveDay::find($id);

        return view('admin.pages.products.days.templates.edit' ,compact('day'));
    }

    public function postIndex(ProductActiveDayRequest $request , $id)
    {
        $request->store($id);

        return ['status' => 'success' ,'data' => 'تم اضافه الحجم بنجاح'];
    }

    public function postEdit(ProductActiveDayRequest $request , $id)
    {
        $request->edit($id);

        return ['status' => 'success' ,'data' => 'تم تعديل الحجم بنجاح'];
    }

    public function getDelete($id)
    {
        $day = ProductActiveDay::find($id);

        $day->delete();

        return redirect()->back();
    }
}
