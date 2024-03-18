<?php

namespace App\Http\Controllers\Site;

use App\Feature;
use App\Home;
use App\Testimonial;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AboutController extends Controller
{
    //
    public function getIndex()
    {
        $home = Home::find(2);
        $features = Feature::all();
        $testimonials = Testimonial::all();

        return view('site.pages.about.index' ,compact('home' , 'features' , 'testimonials'));
    }
}
