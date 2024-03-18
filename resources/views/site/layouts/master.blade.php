<!DOCTYPE html>
<html>
    <head>

        <!-- Basic page needs
        ===========================-->
        <title>البرارى للذبائح</title>
        <meta charset="utf-8">
        <meta name="author" content="">
        <meta name="description" content="">
        <meta name="keywords" content="">

        <!-- Mobile specific metas
        ===========================-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <!-- Favicon
        ===========================-->
        <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/site/images/fav.png')}}">


        <!-- Css Base And Vendor
        ===========================-->

        <link href="https://fonts.googleapis.com/css?family=Almarai:300,400,700,800&display=swap&subset=arabic" rel="stylesheet">
        <link rel="stylesheet" href="{{asset('assets/site/vendor/bootstrap/css/bootstrap.css')}}">
        <link rel="stylesheet" href="{{asset('assets/site/vendor/fontawesome/css/all.css')}}">
        <link rel="stylesheet" href="{{asset('assets/site/vendor/multiselect/css/bootstrap-multiselect.css')}}"/>
        <link rel="stylesheet" href="{{asset('assets/site/vendor/bootstrap-sweetalert/sweetalert.css')}}">
        <link rel="stylesheet" href="{{asset('assets/site/vendor/owl-carousel/css/owl.carousel.css')}}">
        <link rel="stylesheet" href="{{asset('assets/site/vendor/owl-carousel/css/owl.theme.css')}}">
        <link rel="stylesheet" href="{{asset('assets/site/vendor/magnific-popup/css/magnific-popup.css')}}">
        <link rel="stylesheet" href="{{asset('assets/site/vendor/magnific-popup/css/custom.css')}}">


        <!-- Site Style
        ===========================-->
        <link rel="stylesheet" href="{{asset('assets/site/css/style.css')}}">

        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <div id="preloader">
            <div id="loading"></div>
        </div>
        <div id="wrapper">
            @include('site.layouts.header')
            <div class="main">
                @yield('content')
                @include('site.layouts.footer')
            </div>
        </div>

        <!--Scribts Base And Vendor
        ================================-->
        <script src="{{asset('assets/site/vendor/jquery/jquery.js')}}"></script>
        <script src="{{asset('assets/site/vendor/bootstrap/js/popper.js')}}"></script>
        <script src="{{asset('assets/site/vendor/bootstrap/js/bootstrap.js')}}"></script>
        <script src="{{asset('assets/site/vendor/multiselect/js/bootstrap-multiselect.js')}}"></script>
        <script src="{{asset('assets/site/vendor/owl-carousel/js/owl.carousel.min.js')}}"></script>
        <script src="{{asset('assets/site/vendor/magnific-popup/js/magnific-popup.js')}}"></script>
{{--        <script src="{{asset('assets/site/vendor/jquery-validation/js/jquery.validate.min.js')}}"></script>--}}
{{--        <script src="{{asset('assets/site/vendor/jquery-validation/js/additional-methods.min.js')}}"></script>--}}
        <script src="{{asset('assets/site/vendor/bootstrap-wizard/jquery.bootstrap.wizard.min.js')}}"></script>
        <script src="{{asset('assets/site/vendor/bootstrap-sweetalert/sweetalert.js')}}"></script>
        <script src="{{asset('assets/site/js/main.js')}}"></script>
        {{--<script src="{{asset('assets/site/js/form-wizard.js')}}"></script>--}}
        <script src="{{asset('assets/site/js/ui-sweetalert.js')}}"></script>
        @yield('js')
        <script src="{{asset('assets/admin/js/jquery.form.js')}}"></script>
        <script src="{{asset('assets/site/js/site.js')}}"></script>
    </body>
</html>