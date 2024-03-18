<?php

namespace App\Http\Controllers\Admin;

use App\ActiveDayInterval;
use App\Http\Requests\Admin\ActiveDayIntervalRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ActiveDayIntervalController extends Controller
{
    //
    public function getIndex($id)
    {
        $intervals = ActiveDayInterval::where('day_id' , $id)->get();

        return view('admin.pages.products.days.intervals.index' ,compact('intervals' ,'id'));
    }

    public function getInfo($id)
    {
        $interval = ActiveDayInterval::find($id);

        return view('admin.pages.products.days.intervals.templates.edit' ,compact('interval'));
    }

    public function postIndex(ActiveDayIntervalRequest $request , $id)
    {
        $request->store($id);

        return ['status' => 'success' ,'data' => 'تم اضافه الفتره بنجاح'];
    }

    public function postEdit(ActiveDayIntervalRequest $request , $id)
    {
        $request->edit($id);

        return ['status' => 'success' ,'data' => 'تم تعديل الفتره بنجاح'];
    }

    public function getDelete($id)
    {
        $interval = ActiveDayInterval::find($id);

        $interval->delete();

        return redirect()->back();
    }
}
