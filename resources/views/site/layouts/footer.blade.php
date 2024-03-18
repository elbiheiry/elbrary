<footer class="footer">
    <div class="footer-overlay">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="widget">
                        <div class="footer-about">
                            <h3 class="title">ذبائح طازجة</h3>

                            <p>{{$settings->brief}}</p>
                        </div><!--End footer-about-->
                    </div><!--End widget-->
                </div><!--End col-->
                <div class="col-lg-4">
                    <div class="widget">
                        <h3 class="title">معلومات التواصل</h3>
                        <ul class="contact-list">
                            <li>
                                <i class="fab fa-map-marked"></i>
                                {{$settings->address}}
                            </li>
                            <li>
                                <i class="fab fa-whatsapp"></i>
                                {{$settings->phone}}
                            </li>
                            <li>
                                <i class="fab fa-mailchimp"></i>
                                {{$settings->email}}
                            </li>
                        </ul>
                    </div><!--End widget-->
                </div><!--End col-->
                <div class="col-lg-3">
                    <div class="widget">
                        <h3 class="title">اشترك فى النشرة</h3>
                        <form class="newsletter ajax-form" action="{{route('site.subscribe')}}" method="post">
                            {!! csrf_field() !!}

                            <div class="alert alert-success d-none SuccessMessage" id=""></div>
                            <div class="alert alert-danger d-none ErrorMessage" id=""></div>

                            <input class="form-control" placeholder="البريد الالكترونى" name="email" type="email">
                            <button type="submit">اشترك</button>
                        </form>
                        <p class="newsletter-par">اشترك فى نشرتنا البريدية للحصوص على اخر اخبارنا وعروضنا المتجددة</p>


                    </div><!--End widget-->
                </div><!--End col-->
            </div><!--End Row-->
        </div><!--End Container-->
        <div class="footer-copyright">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        جميع الحقوق محفوظة ل البرارى للذبائح ©
                    </div>
                    <div class="col-lg-6 text-left">
                        تصميم وتطوير
                        <a href="https://www.upureka.com">upureka</a>
                    </div>
                </div><!--End Row-->
            </div><!--End Container-->
        </div>

    </div><!--End footer-overlay-->
</footer>