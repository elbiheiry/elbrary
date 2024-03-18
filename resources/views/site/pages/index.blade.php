@extends('site.layouts.master')
@section('content')
    <div class="home-slider" style="background-image: {{asset('storage/uploads/home/'.$homes[0]->image)}}">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="home-slider--cont">
                        <h3 class="title">{{$homes[0]->title}}</h3>
                        <p>{{$homes[0]->description}}</p>
                    </div><!--End home-slider--cont-->
                </div><!--End col-->

            </div><!--End row-->
        </div><!--End container-->
    </div><!--End home-slider-->
    <div class="page-content">
        <section class="about-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5">
                        <div class="about-img">
                            <img src="{{asset('storage/uploads/home/'.$homes[1]->image)}}">
                        </div><!--End home-about-img-->
                    </div><!--End col-->
                    <div class="col-lg-7">
                        <div class="about-cont">
                            <h3 class="title title-bg title-lg-bg">{{$homes[1]->title}}</h3>
                            @foreach(explode("\n" , $homes[1]->description) as $description)
                                <p>{{$description}}</p>
                            @endforeach
                            <a href="{{route('site.about')}}" class="read-more">اقرأ المزيد</a>
                        </div><!--End about-cont-->
                    </div><!--End col-->
                </div><!--End row-->
            </div><!--End container	-->
        </section><!--End home-about-->
        <section class="home-order">
            <div class="home-order-overlay">
                <div class="container">
                    <h3 class="title title-bg title-bg-white">طريقة الطلب</h3>
                    <div class="row justify-content-center">
                        <div class="col-md-4 col-sm-12">
                            <div class="icon-box">
                                <div class="icon-box-cont">
                                    <h3 class="title">الاتصال المباشر</h3>
                                    <p>
                                        نستقبل استفساراتكم من الساعة السابعة صباحا الى الساعة الحادية عشرة ليلا
                                    </p>
                                </div><!--End icon-box-cont-->
                                <div class="icon-box-foot">
                                    <a href="https://api.whatsapp.com/send?phone=966530883131" class="custom-btn" target="_blank">
                                        <i class="fab fa-whatsapp"></i>
                                        واتس اب
                                    </a>
                                </div><!--End icon-box-foot-->
                            </div><!--End icon-box-->
                        </div><!--End col-->
                        <div class="col-md-4 col-sm-12">
                            <div class="icon-box">
                                <div class="icon-box-cont">
                                    <h3 class="title">من خلال التطبيقات </h3>
                                    <p>
                                        اختر طلبك مباشرة مع امكانية تحديد التفاصيل الخاصة بالطلب
                                    </p>
                                </div><!--End icon-box-cont-->
                                <div class="icon-box-foot">
                                    <a href="" class="custom-btn">
                                        <i class="fab fa-app-store"></i>
                                        ابل
                                    </a>
                                    <a href="" class="custom-btn">
                                        <i class="fab fa-android"></i>
                                        اندرويد
                                    </a>

                                </div><!--End icon-box-foot-->
                            </div><!--End icon-box-->
                        </div><!--End col-->
                        <div class="col-md-4 col-sm-12">
                            <div class="icon-box">
                                <div class="icon-box-cont">
                                    <h3 class="title"> من الموقع الالكتروني </h3>
                                    <p>
                                        اختر طلبك مباشرة مع امكانية تحديد التفاصيل الخاصة بالطلب
                                    </p>
                                </div><!--End icon-box-cont-->
                                <div class="icon-box-foot">
                                    <a href="" class="custom-btn">
                                        <i class="fab fa-whatsapp"></i>
                                        اطلب الان
                                    </a>
                                </div><!--End icon-box-foot-->
                            </div><!--End icon-box-->
                        </div><!--End col-->

                    </div><!--End row-->
                </div><!--End container-->
                <div class="home-order-bottom"></div>
            </div><!--End home-order-overlay-->
        </section>

        <section class="home-products">
            <div class="container text-center">
                <h3 class="title title-bg">الطلبات</h3>
                <div class="row">
                    @foreach($products as $product)
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <div class="order-item">
                                <div class="order-item-head">
                                    <div class="order-head-img">
                                        <img src="{{asset('storage/uploads/products/'.$product->image)}}">
                                    </div><!--End order-head-img-->
                                    <div class="order-head-actions">
                                        <a href="{{route('site.order' , ['slug' => $product->slug])}}">
                                            <i class="fas fa-shopping-basket"></i>
                                            اطلب الان
                                        </a>
                                    </div><!--End order-head-actions-->
                                </div><!--End order-item-head-->
                                <div class="order-item-cont">
                                    <h3 class="title">{{$product->name}}</h3>
                                    <p>يبدأ من {{$product->price}} ر.س</p>
                                </div><!--End order-item-cont-->
                            </div><!--End order-item-->
                        </div><!--End col-->
                    @endforeach
                </div><!--End row-->
            </div><!--End container-->
        </section><!--End home-products-->
    </div>
@endsection