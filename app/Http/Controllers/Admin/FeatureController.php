<?php

namespace App\Http\Controllers\Admin;

use App\Feature;
use App\Http\Requests\Admin\FeatureRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FeatureController extends Controller
{
    //
    public function getIndex()
    {
        $features = Feature::all();

        return view('admin.pages.features.index' ,compact('features'));
    }

    public function getInfo($id)
    {
        $feature = Feature::find($id);

        return view('admin.pages.features.templates.edit' ,compact('feature'));
    }

    public function postIndex(FeatureRequest $request)
    {
        $request->store();

        return ['status' => 'success' ,'data' => 'تم اضافه الميزه بنجاح'];
    }

    public function postEdit(FeatureRequest $request , $id)
    {
        $request->edit($id);

        return ['status' => 'success' ,'data' => 'تم تعديل بيانات الميزه بنجاح'];
    }

    public function getDelete($id)
    {
        $feature = Feature::find($id);

        $feature->delete();

        return redirect()->back();
    }
}
