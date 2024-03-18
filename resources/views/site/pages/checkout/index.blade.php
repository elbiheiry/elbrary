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
                        <a href="#">الرئيسية</a>
                    </li>
                    <li class="active">الحساب</li>
                </ul>
                <h4>الحساب</h4>
            </div><!--End Container-->
        </div><!--End breadcrumb-wrap-->
    </section>
    <div class="page-content">
        <section class="section checkout">
            <div class="container">
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-10">
                        <div class="steps-box">
                            <div id="form_wizard_1">
                                <form class="" method="post" action="{{route('site.checkout',['id' => $order->id])}}" id="submit_form">
                                    {!! csrf_field() !!}
                                    <div class="form-body">
                                        <ul class="nav nav-pills nav-justified steps">
                                            <li style="pointer-events : none;">
                                                <a href="#tab1" id="Step1" data-toggle="tab" class="step active" >
                                                    ملخص الطلب والخصم
                                                </a>
                                            </li>
                                            <li style="pointer-events : none;">
                                                <a href="#tab2" id="Step2" data-toggle="tab" class="step" aria-expanded="true">
                                                    تفاصيل الشحن
                                                </a>
                                            </li>
                                            <li style="pointer-events : none;">
                                                <a href="#tab3" id="Step3" data-toggle="tab" class="step" >
                                                    الدفع وتأكيد الطلب
                                                </a>
                                            </li>
                                        </ul><!--End Nav-->
                                        <div class="tab-content">
                                            <div class="tab-pane active" id="tab1">
                                                <div class="inner-tap">
                                                    <div class="Inner-Tap-body">
                                                        <table class="table-cart">
                                                            <thead>
                                                            <tr>
                                                                <th class="product-name">النوع</th>
                                                                <th class="product-price">السعر</th>
                                                                <th class="product-quantity">الكمية</th>
                                                                <th class="product-desc">التفاصيل</th>
                                                                <th class="product-subtotal">الاجمالى</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <tr>
                                                                <td class="product-name">
                                                                    <a href="{{route('site.order' , ['slug' => $order->product['slug']])}}">
                                                                        {{$order->product['name']}}
                                                                    </a>
                                                                </td>
                                                                <td class="product-price">
                                                                    {{$order->product['price']}} ر.س
                                                                </td>
                                                                <td class="product-quantity">
                                                                    {{$order->amount}}
                                                                </td>
                                                                <td class="product-desc">
                                                                    <a href="" data-toggle="modal" data-target="#cart-modal">مشاهدة التفاصيل</a>
                                                                </td>
                                                                <td class="product-subtotal">
                                                                    {{$order->total}} ر.س
                                                                </td>
                                                            </tr>
                                                            <tr id="coupon-row">
                                                                <td class="coupon-price" colspan="3">
                                                                    <div>
                                                                        {!! csrf_field() !!}
                                                                        <span class="col-md-12"><i class="error-data" style="text-align:center; color: #D10508; display: none; font-size: 14px;"></i></span>
                                                                        <div class="form-group">
                                                                            <input class="form-control" name="coupon" placeholder="ادخل كود الخصم ان وجد">
                                                                            <button class="custom-btn" type="submit" id="discount-method">تطبيق</button>
                                                                        </div><!--End form-group-->
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="total-price" colspan="3">
                                                                    <ul class="total-list">
                                                                        <li>
                                                                            <span>الاجمالى</span>
                                                                            <span>{{$order->total}} ر.س</span>
                                                                        </li>
                                                                        <li>
                                                                            <span>بعد الخصم</span>
                                                                            <span id="final-price">{{$order->total}} ر.س</span>
                                                                        </li>
                                                                    </ul><!--End total-list-->
                                                                </td>
                                                            </tr>
                                                            </tbody>
                                                        </table>
                                                    </div><!-- End Inner-Tap-Body -->
                                                </div><!-- End Inner-Tab -->
                                                <div class="form-action">
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="inner-tap">
                                                                <a href="javascript:;" class="step-btn button-next" onclick="second_step();"> التالى
                                                                </a>
                                                            </div><!--End inner-tap-->
                                                        </div>
                                                    </div><!--End Row-->
                                                </div><!--End Form-action-->
                                            </div><!--End Tab-pane-->
                                            <div class="tab-pane" id="tab2">
                                                <div class="inner-tap">
                                                    <div class="Inner-Tap-body">
                                                        <span class="col-md-12"><i class="error-data" style="text-align:center; color: #D10508; display: none; font-size: 14px;"></i></span>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label>الاسم</label>
                                                                    <input type="text" name="name" id="memberName" placeholder="اكتب الاسم كاملا" class="form-control">
                                                                </div><!--End form-group-->
                                                            </div><!--End col-md-6-->
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label>المدينة</label>
                                                                    <select class="custom-select" name="city_id">
                                                                        @foreach($cities as $city)
                                                                            <option value="{{$city->id}}">{{$city->name}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div><!--End form-group-->

                                                            </div><!--End col-md-6-->
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label>رقم الجوال</label>
                                                                    <input type="text" name="phone" id="PhoneNumber" placeholder="رقم الجوال يجب ان يبدا 00966" class="form-control">
                                                                </div><!--End form-group-->
                                                            </div><!--End col-md-6-->
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label>العنوان</label>
                                                                    <input type="text" name="address" id="AddressInput" placeholder="ادخل العنوان كاملا" class="form-control">
                                                                </div><!--End form-group-->
                                                            </div><!--End col-md-6-->
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label>يوم التوصيل</label>
                                                                    <select class="custom-select" id="delivery-day" name="day_id" data-url="{{route('site.intervals')}}">
                                                                        @foreach($days as $day)
                                                                            <option value="{{$day->id}}">{{$day->name}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div><!-- End Form-Group -->
                                                            </div><!--End col-->
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label>
                                                                        فترة التوصيل : *
                                                                    </label>
                                                                    <select class="custom-select" name="interval_id" id="intervals-area">
                                                                        @include('site.pages.checkout.templates.intervals')
                                                                    </select>
                                                                </div><!-- End Form-Group -->
                                                            </div><!--End col-->
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label>
                                                                        ملاحظات الشحن
                                                                    </label>
                                                                    <textarea class="form-control" name="notes"></textarea>
                                                                </div><!-- End Form-Group -->
                                                            </div><!--End col-->
                                                        </div><!--End row-->
                                                    </div><!-- End Inner-Tap-Body -->
                                                </div><!-- End Inner-Tab -->
                                                <div class="form-action">
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="inner-tap">
                                                                <a href="javascript:;" class="step-btn button-previous" onclick="first_step();"> السابق </a>
                                                                <a href="javascript:;" class="step-btn button-next" onclick="third_step();"> التالى</a>
                                                            </div><!--End inner-tap-->
                                                        </div>
                                                    </div><!--End Row-->
                                                </div><!--End Form-action-->
                                            </div><!--End Tab-pane-->
                                            <div class="tab-pane" id="tab3">
                                                <div class="inner-tap">
                                                    <div class="Inner-Tap-body">
                                                        <div class="row">
                                                            <div class="form-group">
                                                                <label>طريقة الدفع</label>
                                                                <div class="radio-check-item radius-item">
                                                                    <input name="payment_method" class="form-control" id="cash" type="radio" value="الدفع نقدا عند الاستلام">
                                                                    <label for="cash">الدفع نقدا عند الاستلام</label>
                                                                </div><!-- End Radio-Check-Item -->
                                                                <div class="radio-check-item radius-item">
                                                                    <input name="payment_method" class="form-control" id="mada" type="radio" value="تحويل على الحساب البنكى">
                                                                    <label for="mada"> تحويل على الحساب البنكى</label>
                                                                </div><!-- End Radio-Check-Item -->
                                                            </div><!--End form-group-->
                                                        </div><!--End row-->
                                                        <div class="row">
                                                            <div class="">
                                                                <div class="form-group form-3">
                                                                    <label>طريقة تأكيد الطلب عن طريق</label>
                                                                    <div class="radio-check-item radius-item">
                                                                        <input name="confirmation" class="form-control" id="whats" type="radio" value="واتس اب">
                                                                        <label for="whats">واتس اب</label>
                                                                    </div><!-- End Radio-Check-Item -->
                                                                    <div class="radio-check-item radius-item">
                                                                        <input name="confirmation" class="form-control" id="call" type="radio" value="اتصال">
                                                                        <label for="call">اتصال</label>

                                                                    </div><!-- End Radio-Check-Item -->
                                                                </div>
                                                            </div><!--End col-->
                                                        </div><!--End row-->
                                                    </div><!-- End Inner-Tap-Body -->

                                                </div><!-- End Inner-Tab -->
                                                <div class="form-action">
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="inner-tap">
                                                                <a href="javascript:;" class="step-btn button-previous" onclick="second_step();"> السابق </a>
                                                                <a href="javascript:;" class="step-btn button-submit"> حفظ
                                                                    <i class="fa fa-check"></i>
                                                                </a>
                                                            </div><!--End inner-tap-->
                                                        </div>
                                                    </div><!--End Row-->
                                                </div><!--End Form-action-->
                                            </div><!--End Tab-pane-->
                                        </div><!--End Tap-content-->
                                    </div><!--End Form-body-->
                                </form><!--End Form-->
                            </div><!--End Div Of Form-wizard-->
                        </div><!--End Steps-box-->

                    </div><!--End col-->
                </div><!--End row-->
            </div><!-- End container -->
        </section><!-- End Section -->
        <br><br><br><br>
    </div>
    <div class="modal fade" id="cart-modal" tabindex="-1" role="dialog" aria-labelledby="cart-modalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <table class="table">
                        <tbody>
                        <tr>
                            <td>
                                <p>النوع</p>
                            </td>
                            <td>
                                <p>{{$order->category['name']}}</p>
                            </td>
                            <td>
                                <p>طريقة التقطيع</p>
                            </td>
                            <td>
                                <p>{{$order->cut['name']}}</p>
                            </td>

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
                </div><!--End modal-body-->

            </div><!--End modal-content-->
        </div><!--End modal-dialog-->
    </div>
@endsection
@section('js')
    <script>
        $('#discount-method').on('click' , function () {
            var url = "{{route('site.discount' , ['id' => $order->product['id'] , 'order_id' => $order->id])}}";

            $.ajax({
                url : url,
                method : 'post',
                dataType : 'json',
                data : {
                    coupon : $('input[name="coupon"]').val(),
                    _token : $('input[name="_token"]').val()
                },
                success : function (response) {
                    if (response.status === 'success'){
                        $('#final-price').html(response.total + ' ر.س ');
                        $('#coupon-row').hide();
                    }else{
                        $('.error-data').html(response.data);
                        $('.error-data').css('display' , 'block');
                        setTimeout(function () {
                            $('.error-data').html('');
                            $('.error-data').css('display' , 'none');
                        } , 3000)
                    }
                }
            });
            return false;
        });

        var form = $('#submit_form');
        var error = $('.alert-danger', form);
        var success = $('.alert-success', form);

        function first_step(){
            $('#Step1').trigger('click');
        }

        function second_step(){
            $('#Step2').trigger('click');
        }

        function third_step(){
            if (validate_step_one()) {
                $('#Step3').trigger('click');
            }
        }

        function validate_step_one() {
            if ($('#memberName').val() == '' || $('#memberName').val() == null){
                swal({
                    title: "برجاء ادخال اسمك بالكامل",
                    type: "error",
                    confirmButtonClass: "swal-confirm",
                    confirmButtonText: "اغلاق!",
                    titleClass:"swal-text",
                    closeOnConfirm: true,
                    allowOutsideClick: true
                });

                return false;
            }

            if ($('#PhoneNumber').val() == '' || $('#PhoneNumber').val() == null){
                swal({
                    title: "برجاء ادخال رقم الهاتف الخاص بك",
                    type: "error",
                    confirmButtonClass: "swal-confirm",
                    confirmButtonText: "اغلاق!",
                    titleClass:"swal-text",
                    closeOnConfirm: true,
                    allowOutsideClick: true
                });

                return false;
            }

            if ($('#AddressInput').val() == '' || $('#AddressInput').val() == null){
                swal({
                    title: "برجاء ادخال العنوان بالكامل",
                    type: "error",
                    confirmButtonClass: "swal-confirm",
                    confirmButtonText: "اغلاق!",
                    titleClass:"swal-text",
                    closeOnConfirm: true,
                    allowOutsideClick: true
                });

                return false;
            }

            return true;
        }

        $('.button-submit').on('click' ,function () {
            var form = $(this).closest('form');
            var url = form.attr('action');

            $.ajax({
                url : url,
                dataType: 'json',
                method: 'POST',
                data : form.serialize(),
                success : function (response) {
                    if (response.status === 'success'){
                        swal({
                            title: response.title,
                            type: "success",
                            confirmButtonClass: "swal-confirm",
                            confirmButtonText: "اغلاق!",
                            titleClass:"swal-text",
                            closeOnConfirm: true,
                            allowOutsideClick: true
                        }, function () {
                            location.replace("{{route('site.orders')}}");
                        });

                    }else{
                        swal({
                            title: response.title,
                            type: "error",
                            confirmButtonClass: "swal-confirm",
                            confirmButtonText: "اغلاق!",
                            titleClass:"swal-text",
                            closeOnConfirm: true,
                            allowOutsideClick: true
                        });
                    }
                }
            })
        })

        $('#delivery-day').on('change' , function () {
            // alert($(this).val())
            var url = $(this).data('url');
            $.ajax({
                url : url,
                method : 'post',
                dataType : 'json',
                data : {
                    id : $(this).val(),
                    _token : $('input[name="_token"]').val()
                },
                success : function (response) {
                    $('#intervals-area').html(response.view);
                }
            });
            return false;
        })
    </script>
@endsection