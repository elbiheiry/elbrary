<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\TestimonailRequest;
use App\Testimonial;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TestimonialController extends Controller
{
    //
    public function getIndex()
    {
        $testimonials = Testimonial::all();

        return view('admin.pages.testimonials.index' ,compact('testimonials'));
    }

    public function getInfo($id)
    {
        $testimonial = Testimonial::find($id);

        return view('admin.pages.testimonials.templates.edit' ,compact('testimonial'));
    }

    public function postIndex(TestimonailRequest $request)
    {
        $request->store();

        return ['status' => 'success' ,'data' => 'تم اضافه راي العميل بنجاح'];
    }

    public function postEdit(TestimonailRequest $request , $id)
    {
        $request->edit($id);

        return ['status' => 'success' ,'data' => 'تم تعديل راي العميل بنجاح'];
    }

    public function getDelete($id)
    {
        $testimonial = Testimonial::find($id);

        $testimonial->delete();

        return redirect()->back();
    }
}
