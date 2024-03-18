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
                <li class="active">{{$product->name}}</li>
            </ul>
            <h4>{{$product->name}}</h4>
        </div><!--End Container-->
    </section>

    <div class="page-content">
        <section class="section-md order-detail">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5">
                        <div class="order-detail-img">
                            <img src="{{asset('storage/uploads/products/'.$product->image)}}">
                        </div><!--End order-detail-img-->
                        <div class="order--title-price">
                            <div class="title-rate">
                                <h3 class="title">{{$product->name}}</h3>
                            </div><!--End title-rate-->
                            <p class="price">
                                يبدأ من {{$product->price}} ر.س
                            </p>
                        </div><!--End order--title-price-->

                    </div><!--End col-->
                    <div class="col-lg-7">

                        <div class="order-detail-desc">
                            <div class="order-app--form">
                                <form method="post" action="{{route('site.orders')}}" id="submit-form">
                                    {!! csrf_field() !!}
                                    <input type="hidden" name="product_id" value="{{$product->id}}">
                                    <input type="hidden" name="total" id="total-input">
                                    <div class="row">
                                        <span class="col-md-12"><i class="error-data" style="text-align:center; color: #D10508; display: none; font-size: 14px;"></i></span>
                                        @if($product->categories()->count() > 0)
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>الحجم المطلوب</label>
                                                    <select class="custom-select" name="category_id" id="size-input">
                                                        <option disabled selected value="0">اختر الحجم المطلوب</option>
                                                        @foreach($product->categories as $category)
                                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div><!--End form-group-->
                                            </div><!--End col-->
                                        @endif
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>الكمية *</label>
                                                <div class="count-number">
                                                    <a href="#" class="number-up">
                                                        <i class="fa fa-plus"></i>
                                                    </a>
                                                    <input value="0" name="amount" class="form-control" type="text"
                                                           id="amount-input">
                                                    <a href="#" class="number-down">
                                                        <i class="fa fa-minus"></i>
                                                    </a>
                                                </div><!--End count-number-->

                                            </div><!--End form-group-->
                                        </div><!--End col-->
                                        @if($product->cuts()->where('type' , 0)->get()->count() > 0)
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>طريقة التقطيع</label>
                                                    <select class="custom-select" name="cut_id">
                                                        <option disabled selected>طريقة التقطيع</option>
                                                        @foreach($product->cuts()->where('type' , 0)->get() as $cut)
                                                            <option value="{{$cut->id}}">{{$cut->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div><!--End form-group-->
                                            </div><!--End col-->
                                        @endif
                                        @if($product->accessories()->count() > 0)
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>الملحقات المطلوبة</label>
                                                    <select multiple="multiple" class="custom-select"
                                                            name="accessories[]">
                                                        @foreach($product->accessories as $accessory)
                                                            <option value="{{$accessory->id}}">{{$accessory->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div><!--End form-group-->
                                            </div><!--End col-->
                                        @endif
                                    </div><!--End row-->
                                    @if($product->cuts()->where('type' , 1)->get()->count() > 0)
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <label>طرق تقطيع اضافية</label>

                                            </div>
                                            <div class="col-md-12">
                                                @foreach($product->cuts()->where('type' , 1)->get() as $cut)
                                                    <div class="input-block-wrap">
                                                        <div class="radio-check-item">
                                                            <input name="other_cuts[]"
                                                                   class="form-control cutting-methods"
                                                                   id="{{$cut->id}}" value="{{$cut->id}}" type="checkbox">
                                                            <label for="{{$cut->id}}">{{$cut->name}}</label>
                                                        </div><!-- End Radio-Check-Item -->
                                                        <div class="{{$cut->id}}-block">
                                                            <input class="form-control other-cut" type="number"
                                                                   data-price="{{$cut->price}}" name="other_prices[]"
                                                                   placeholder="عدد الكيلو">
                                                        </div>
                                                    </div><!--End input-block-wrap-->
                                                @endforeach
                                            </div><!--End col-->
                                        </div><!--End form-group-->
                                    @endif

                                    <div class="form-group">
                                        <label>ملاحظات الطلب *</label>
                                        <textarea rows="3" class="form-control" name="message"></textarea>
                                    </div><!--End form-group-->
                                    <div class="order-ap--submit">
                                        <button class="custom-btn" type="submit">
                                            <i class="fas fa-shopping-basket"></i>
                                            اكمال الطلب
                                        </button>
                                        <p>
                                            السعر الاجمالي
                                            <span id="total-price">{{$product->price}}</span>
                                            <span>ر.س</span>
                                        </p>
                                    </div><!--End form-group-->
                                </form>
                            </div><!--End order-app--form-->
                        </div><!--End order-detail-desc-->
                    </div><!--End col-->
                </div><!--End row-->
                <div class="row">
                    <div class="col-lg-8">
                    </div><!--End col-->
                </div><!--End row-->
            </div><!--End container-->
        </section>
    </div><!--End page-content-->
@endsection
@section('js')
    <script>
        $(document).on('change', '#size-input , .other-cut', function () {
            form_submit();
        });

        function form_submit() {
            var url = "{{route('site.order.submit' , ['id' => $product->id])}}";
            var size = $('#size-input').val();
            var amount = $('#amount-input').val();
            var cuts = $("input[name='other_prices[]']").map(function(){
                return $(this).val();
            }).get();

            $.ajax({
                url: url,
                method: 'post',
                dataType: 'json',
                data: {
                    size: size,
                    amount: amount,
                    cuts: cuts,
                    _token: $('input[name="_token"]').val()
                },
                success: function (response) {
                    if (response.status === 'error'){
                        $('.error-data').html(response.data);
                        $('.error-data').css('display' , 'block');
                        setTimeout(function () {
                            $('.error-data').html('');
                            $('.error-data').css('display' , 'none');
                        } , 3000)
                    }else{
                        $('#total-price').html(response.price);
                        $('#total-input').val(response.price);
                    }
                }
            });
            return false;
        }

        $('#submit-form').on('submit' , function () {
            var url = $(this).attr('action');

            $.ajax({
                url: url,
                method: 'post',
                dataType: 'json',
                data: $(this).serialize(),
                success: function (response) {
                    if (response.status === 'error'){
                        $('.error-data').html(response.data);
                        $('.error-data').css('display' , 'block');
                        setTimeout(function () {
                            $('.error-data').html('');
                            $('.error-data').css('display' , 'none');
                        } , 3000)
                    }else{
                        window.location.href = response.url;
                    }
                }
            });
            return false;
        });
    </script>
@endsection