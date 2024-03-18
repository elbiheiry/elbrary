<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\ProductCutRequest;
use App\ProductCut;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductCutController extends Controller
{
    //
    public function getIndex($id)
    {
        $cuts = ProductCut::where('product_id' , $id)->get();

        return view('admin.pages.products.cuts.index' ,compact('cuts' ,'id'));
    }

    public function getInfo($id)
    {
        $cut = ProductCut::find($id);

        return view('admin.pages.products.cuts.templates.edit' ,compact('cut'));
    }

    public function postIndex(ProductCutRequest $request , $id)
    {
        $request->store($id);

        return ['status' => 'success' ,'data' => 'تم اضافه طريقه القطع بنجاح'];
    }

    public function postEdit(ProductCutRequest $request , $id)
    {
        $request->edit($id);

        return ['status' => 'success' ,'data' => 'تم تعديل طريقه القطع بنجاح'];
    }

    public function getDelete($id)
    {
        $category = ProductCut::find($id);

        $category->delete();

        return redirect()->back();
    }
}
