@extends('admin.layouts.master')
@section('title')
    تفاصيل الطلب
@endsection
@section('content')
    <div class="content">
        <div class="col-sm-12 page-heading">
            <div class="col-sm-6">
                <h2>تفاصيل الطلب</h2>
            </div><!--End col-md-6-->
            <div class="col-sm-6">
                <ul class="breadcrumb">
                    <li><a href="{{route('admin.dashboard')}}">لوحة التحكم</a></li>
                    <li class="active">تفاصيل الطلب</li>
                </ul>
            </div><!--End col-md-6-->
        </div>
        <div class="spacer-15"></div>
        <div class="widget">
            <div class="widget-content">
                <div class="col-md-6 form-group">
                    <label>الاسم</label>
                    <blockquote>{{$checkout->name}}</blockquote>
                </div>
                <div class="col-md-6 form-group">
                    <label>المدينه</label>
                    <blockquote>{{$checkout->city['name']}}</blockquote>
                </div>
                <div class="col-md-6 form-group">
                    <label>اليوم</label>
                    <blockquote>{{$checkout->day['name']}}</blockquote>
                </div>
                <div class="col-md-6 form-group">
                    <label>الفتره</label>
                    <blockquote>{{$checkout->interval['name']}}</blockquote>
                </div>
                <div class="col-md-6 form-group">
                    <label>رقم الجوال</label>
                    <blockquote>{{$checkout->phone}}</blockquote>
                </div>
                <div class="col-md-6 form-group">
                    <label>العنوان</label>
                    <blockquote>{{$checkout->address}}</blockquote>
                </div>
                <div class="col-md-6 form-group">
                    <label>طريقه الاستلام</label>
                    <blockquote>{{$checkout->confirmation}}</blockquote>
                </div>
                <div class="col-md-6 form-group">
                    <label>طريقه الدفع</label>
                    <blockquote>{{$checkout->payment_method}}</blockquote>
                </div>
                <div class="col-md-6 form-group">
                    <label>اجمالي المبلغ المطلوب</label>
                    <blockquote>{{$checkout->order->total}}</blockquote>
                </div>
            </div>
        </div>
        <div class="spacer-15"></div>
        <div class="widget">
            <div class="widget-content">
                <div class="spacer-15"></div>
                <div class="table-responsive">
            <table class="table table-bordered table-hover text-center">
                <thead>
                @php
                    $order = $checkout->order()->first();
                @endphp
                <tr >
                    <th class="text-center">اسم المنتج</th>
                    <th class="text-center">الكمبه</th>
                    <th class="text-center">الحجم المطلوب</th>
                    <th class="text-center">طريقه التقطيع</th>

                    <th class="text-center">الملاحظات</th>
                    <th class="text-center">اجمالي السعر</th>
                </tr>
                </thead>
                <tbody>

                    <tr>
                        <td>{{$order->product['name']}}</td>
                        <td>{{$order->amount}}</td>
                        <td>{{$order->category['name']}}</td>
                        <td>{{$order->cut['name']}}</td>
                        <td>{{$order->message}}</td>
                        <td>{{$order->total}}</td>
                    </tr>
                    @if(json_decode($order->accessories) != null)
                        <tr>
                            <td>
                                <p>الملحقات المطلوبة</p>
                            </td>
                            <td colspan="3">
                                @php
                                    $accessories = json_decode($order->accessories);
                                    $prices = json_decode($order->other_price);
                                @endphp
                                <p>
                                    @foreach($accessories as $accessory)
                                        {{\App\ProductAccessory::where('id' , $accessory)->first()->name}} @if(!$loop->last){{'-'}}@endif
                                    @endforeach
                                </p>
                            </td>
                        </tr>
                    @endif
                    @php
                        $cuts = json_decode($order->other_cut);
                    @endphp
                    @if($cuts != null)
                        @foreach(array_chunk($cuts , 2) as $row)
                            <tr>
                                @foreach($row as $index => $cut)
                                    <td>
                                        <p>{{\App\ProductCut::where('id' , $cut)->first()->name}}</p>
                                    </td>

                                    <td>
                                        <p>{{$prices[$index]}}</p>
                                    </td>
                                @endforeach
                            </tr>
                        @endforeach
                    @endif

                    <tr>
                        <td>
                            <p>ملاحظات</p>
                        </td>
                        <td colspan="3">
                            <p>{{$order->message}} </p>
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>
            </div>
        </div>
    </div>
@endsection