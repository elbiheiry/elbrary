@extends('site.layouts.master')
@section('content')
    <section class="page-head">
        <div class="head-img">
            <img src="{{asset('assets/site/images/page-head.png')}}">
        </div><!--End head-img-->
        <div class="breadcrumb-wrap">
            <div class="container">
                <ul class="breadcrumb">
                    <li>
                        <a href="{{route('site.index')}}">الرئيسية</a>
                    </li>
                    <li class="active">من نحن</li>
                </ul>
                <h4>من نحن</h4>
            </div><!--End Container-->
        </div><!--End breadcrumb-wrap-->
    </section>
    <div class="page-content">
        <section class="about-section about2">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="about-cont">
                            <h3 class="title title-bg title-lg-bg">{{$home->title}}</h3>
                            @foreach(explode("\n" , $home->description) as $description)
                                <p>{{$description}}</p>
                            @endforeach
                            <a href="https://maroof.sa/90625">
                                <img src="{{asset('assets/site/images/maarof.png')}}">
                                هذا الموقع معتمد من وزارة التجارة
                            </a>
                        </div><!--End about-cont-->
                    </div><!--End col-->
                    <div class="col-lg-4">
                        <div class="about-img">
                            <img src="{{asset('storage/uploads/home/'.$home->image)}}">
                        </div><!--End about-img-->
                    </div><!--End col-->
                </div><!--End row-->
            </div><!--End container	-->
        </section><!--End home-about-->
        <section class="home-order home-order2">
            <div class="home-order-overlay">
                <div class="container">
                    <div class="row justify-content-center">
                        @foreach($features as $feature)
                            <div class="col-md-4 col-sm-12">
                                <div class="icon-box">
                                    <div class="icon-box-head">
                                        <img src="{{asset('storage/uploads/features/'.$feature->image)}}">
                                    </div><!--End icon-box-head-->
                                    <div class="icon-box-cont">
                                        <h3 class="title">{{$feature->name}}</h3>
                                        <p>{{$feature->description}}</p>
                                    </div><!--End icon-box-cont-->
                                </div><!--End icon-box-->
                            </div><!--End col-->
                        @endforeach
                    </div><!--End row-->
                </div><!--End container-->
                <div class="home-order-bottom"></div>
            </div><!--End home-order-overlay-->
        </section>
        <section class="testimonial">
            <div class="container text-center">
                <h3 class="title title-bg title-lg-bg">اراء العملاء</h3>
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-content">
                            <div id="testimonial-1" class="owl-carousel">
                                @foreach($testimonials as $testimonial)
                                    <a class="testmonial-item" href="{{asset('storage/uploads/testimonials/'.$testimonial->image)}}">
                                        <img src="{{asset('storage/uploads/testimonials/'.$testimonial->image)}}">
                                    </a><!--End testmonial-item-->
                                @endforeach
                            </div><!--End owl-carousel-->
                        </div><!-- End Section-Content -->
                    </div><!--End col-->
                </div><!--End row-->
            </div><!-- End container -->
        </section><!-- End Section -->
    </div>
@endsection