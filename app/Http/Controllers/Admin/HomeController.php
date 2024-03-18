<?php

namespace App\Http\Controllers\Admin;

use App\Home;
use App\Http\Requests\Admin\HomeRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    //
    public function getIndex()
    {
        $homes = Home::orderBy('id' , 'DESC')->get();

        return view('admin.pages.home.index' ,compact('homes'));
    }

    public function getInfo($id)
    {
        $home = Home::find($id);

        return view('admin.pages.home.templates.edit' ,compact('home'));
    }

    public function postIndex(HomeRequest $request , $id)
    {
        $request->edit($id);

        return ['status' => 'success' , 'data' => 'تم تعديل البيانات بنجاح'];
    }
}
