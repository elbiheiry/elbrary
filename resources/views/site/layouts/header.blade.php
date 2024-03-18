<header class="header">
    <div class="top-header">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="contact-cart-head">
                        <div class="head-phone">
                            <i class="fab fa-whatsapp"></i>
                            {{$settings->phone}}
                        </div><!--End head-phone-->
                        <ul class="social-list">
                            @if($settings->facebook)
                                <li>
                                    <a href="{{$settings->facebook}}" target="_blank">
                                        <i class="fab fa-facebook"></i>
                                    </a>
                                </li>
                            @endif

                            @if($settings->twitter)
                                <li>
                                    <a href="{{$settings->twitter}}" target="_blank">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                </li>
                            @endif

                            @if($settings->youtube)
                                <li>
                                    <a href="{{$settings->youtube}}" target="_blank">
                                        <i class="fab fa-youtube"></i>
                                    </a>
                                </li>
                            @endif
                        </ul><!-- End Social-List -->
                    </div><!-- End contact-cart-head -->
                </div><!-- End col -->
            </div><!-- End row -->
        </div><!-- End container -->
    </div><!-- End Top-Header -->
    <div class="container">
        <a href="#" class="logo">
            <img src="{{asset('assets/site/images/logo.png')}}">
            <img src="{{asset('assets/site/images/logo-sm.png')}}">
        </a>
        <button class="btn btn-responsive-nav" data-toggle="collapse" data-target="#nav-main">
            <i class="fa fa-bars"></i>
        </button>
    </div><!-- End container-->
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <div class="collapse navbar-collapse" id="nav-main">
                <ul class="navbar-nav">
                    <li class="nav-item @if(request()->route()->getName() == 'site.index'){{'active'}}@endif">
                        <a class="nav-link" href="{{route('site.index')}}">الرئيسية</a>
                    </li>

                    <li class="nav-item @if(request()->route()->getName() == 'site.about'){{'active'}}@endif">
                        <a class="nav-link" href="{{route('site.about')}}">من نحن</a>
                    </li>
                    <li class="nav-item @if(request()->route()->getName() == 'site.orders'){{'active'}}@endif">
                        <a class="nav-link" href="{{route('site.orders')}}">الطلبات</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">الصور والفيديو</a>
                    </li>
                    <li class="nav-item @if(request()->route()->getName() == 'site.contact'){{'active'}}@endif">
                        <a class="nav-link" href="{{route('site.contact')}}">اتصل بنا</a>
                    </li>
                </ul>
            </div>
        </div><!-- End container -->
    </nav>
</header>