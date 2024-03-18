<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\ProductAccessoryRequest;
use App\ProductAccessory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductAccessoryController extends Controller
{
    //
    public function getIndex($id)
    {
        $accessories = ProductAccessory::where('product_id' , $id)->get();

        return view('admin.pages.products.accessories.index' ,compact('accessories' ,'id'));
    }

    public function getInfo($id)
    {
        $accessory = ProductAccessory::find($id);

        return view('admin.pages.products.accessories.templates.edit' ,compact('accessory'));
    }

    public function postIndex(ProductAccessoryRequest $request , $id)
    {
        $request->store($id);

        return ['status' => 'success' ,'data' => 'تم اضافه الحجم بنجاح'];
    }

    public function postEdit(ProductAccessoryRequest $request , $id)
    {
        $request->edit($id);

        return ['status' => 'success' ,'data' => 'تم تعديل الحجم بنجاح'];
    }

    public function getDelete($id)
    {
        $accessory = ProductAccessory::find($id);

        $accessory->delete();

        return redirect()->back();
    }
}
