<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\ProductDiscountRequest;
use App\ProductDiscount;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductDiscountController extends Controller
{
    //
    public function getIndex($id)
    {
        $discounts = ProductDiscount::where('product_id' , $id)->get();

        return view('admin.pages.products.discounts.index' ,compact('discounts' ,'id'));
    }

    public function getInfo($id)
    {
        $discount = ProductDiscount::find($id);

        return view('admin.pages.products.discounts.templates.edit' ,compact('discount'));
    }

    public function postIndex(ProductDiscountRequest $request , $id)
    {
        $request->store($id);

        return ['status' => 'success' ,'data' => 'تم اضافه كود الخصم بنجاح'];
    }

    public function postEdit(ProductDiscountRequest $request , $id)
    {
        $request->edit($id);

        return ['status' => 'success' ,'data' => 'تم تعديل كود الخصم بنجاح'];
    }

    public function getDelete($id)
    {
        $discount = ProductDiscount::find($id);

        $discount->delete();

        return redirect()->back();
    }
}
