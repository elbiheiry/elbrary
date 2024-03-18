@extends('site.layouts.master')
@section('content')
    <section class="page-head">
        <div class="head-img">
            <img src="{{asset('assets/site/images/page-head.png')}}">
        </div><!--End head-img-->
        <div class="container">
            <ul class="breadcrumb">
                <li>
                    <a href="#">الرئيسية</a>
                </li>
                <li class="active">الطلبات</li>
            </ul>
            <h4>الطلبات</h4>
        </div><!--End Container-->
    </section>
    <div class="page-content">
        <section class="home-products products2">
            <div class="container text-center">
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