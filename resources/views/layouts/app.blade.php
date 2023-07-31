<!DOCTYPE html>
<html>
<body lang="en">

<!-- Mirrored from colorlib.com/polygon/admindek/default/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 12 Dec 2019 16:07:52 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
    <title>E-Clinic</title>
    <style>
        .alert{
            position: absolute;
            right: 0;
            z-index: 1;
        }

    </style>

    <script type="text/javascript" src="{{asset('template/js/jquery.min.js')}}"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <!--[if lt IE 10]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="Admindek Bootstrap admin template made using Bootstrap 4 and it has huge amount of ready made feature, UI components, pages which completely fulfills any dashboard needs." />
    <meta name="keywords" content="flat ui, admin Admin , Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app">
    <meta name="author" content="colorlib" />

    <link rel="icon" href="https://colorlib.com/polygon/admindek/files/assets/images/favicon.ico" type="image/x-icon">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Quicksand:500,700" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="{{asset('template/css/bootstrap.min.css')}}">
    <link href="https://cdn.datatables.net/v/bs5/dt-1.13.4/b-2.3.6/b-html5-2.3.6/datatables.min.css" rel="stylesheet"/>

    <link rel="stylesheet" href="{{asset('template/css/waves.min.css')}}" type="text/css" media="all">

    <link rel="stylesheet" type="text/css" href="{{asset('template/css/feather.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('template/css/font-awesome-n.min.css')}}">

    <link rel="stylesheet" href="{{asset('template/css/chartist.css')}}" type="text/css" media="all">

    <link rel="stylesheet" type="text/css" href="{{asset('template/css/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('template/css/widget.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('template/css/themify-icons.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('template/css/icofont.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('template/css/pages.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('css/billing.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('template/css/bootstrap-datetimepicker.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('template/css/daterangepicker.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('template/css/datedropper.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('template/css/spectrum.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('template/css/jquery.minicolors.css')}}">



    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />



    <!-- CSS -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
    <!-- Default theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>

</head>
<body themebg-pattern="theme1">




<div class="loader-bg">
    <div class="loader-bar"></div>
</div>

<div id="pcoded" class="pcoded">
    <div class="pcoded-overlay-box"></div>
    <div class="pcoded-container navbar-wrapper">

        @include('layouts.header')


        <div class="pcoded-main-container">
            <div class="pcoded-wrapper">

                @include('layouts.navigation')

                @if (Session::has('message'))
                    <div class="alert alert-success background-danger" style="position: absolute">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close" >
                            <i class="icofont icofont-close-line-circled text-white"></i>
                        </button>
                        {{Session::get('message') }}

                    </div>
                @endif
                @yield('content')




                <div id="styleSelector">
                </div>

            </div>
        </div>
    </div>
</div>


<!--[if lt IE 10]>
<div class="ie-warning">
    <h1>Warning!!</h1>
    <p>You are using an outdated version of Internet Explorer, please upgrade
        <br/>to any of the following web browsers to access this website.
    </p>
    <div class="iew-container">
        <ul class="iew-download">
            <li>
                <a href="http://www.google.com/chrome/">
                    <img src="../files/assets/images/browser/chrome.png" alt="Chrome">
                    <div>Chrome</div>
                </a>
            </li>
            <li>
                <a href="https://www.mozilla.org/en-US/firefox/new/">
                    <img src="../files/assets/images/browser/firefox.png" alt="Firefox">
                    <div>Firefox</div>
                </a>
            </li>
            <li>
                <a href="http://www.opera.com">
                    <img src="../files/assets/images/browser/opera.png" alt="Opera">
                    <div>Opera</div>
                </a>
            </li>
            <li>
                <a href="https://www.apple.com/safari/">
                    <img src="../files/assets/images/browser/safari.png" alt="Safari">
                    <div>Safari</div>
                </a>
            </li>
            <li>
                <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
                    <img src="../files/assets/images/browser/ie.png" alt="">
                    <div>IE (9 & above)</div>
                </a>
            </li>
        </ul>
    </div>
    <p>Sorry for the inconvenience!</p>
</div>
<![endif]-->
<script type="text/javascript">
    setTimeout(function() {
        $('.alert').fadeOut(1000, function() {
            $(this).alert('close');
        });

    }, 4000);
</script>


<script data-cfasync="false" src="{{asset('template/js/email-decode.min.js')}}"></script>
<script type="text/javascript" src="{{asset('template/js/jquery-ui.min.js')}}"></script>
<script type="text/javascript" src="{{asset('template/js/popper.min.js')}}"></script>
<script type="text/javascript" src="{{asset('template/js/bootstrap.min.js')}}"></script>

<script src="{{asset('template/js/waves.min.js')}}" type="text/javascript"></script>

<script type="text/javascript" src="{{asset('template/js/jquery.slimscroll.js')}}"></script>

<script src="{{asset('template/js/jquery.flot.js')}}" type="text/javascript"></script>
<script src="{{asset('template/js/jquery.flot.categories.js')}}" type="text/javascript"></script>
<script src="{{asset('template/js/curvedlines.js')}}" type="text/javascript"></script>
<script src="{{asset('template/js/jquery.flot.tooltip.min.js')}}" type="text/javascript"></script>

<script src="{{asset('template/js/chartist.js')}}" type="text/javascript"></script>

<script src="{{asset('template/js/amcharts.js')}}" type="text/javascript"></script>
<script src="{{asset('template/js/serial.js')}}" type="text/javascript"></script>
<script src="{{asset('template/js/light.js')}}" type="text/javascript"></script>
<script src="{{asset('template/js/modernizr.js')}}" type="text/javascript"></script>
<script src="{{asset('template/js/css-scrollbars.js')}}" type="text/javascript"></script>
<script src="{{asset('template/js/moment-with-locales.min.js')}}" type="text/javascript"></script>
<script src="{{asset('template/js/bootstrap-datepicker.min.js')}}" type="text/javascript"></script>
<script src="{{asset('template/js/bootstrap-datetimepicker.min.js')}}" type="text/javascript"></script>
<script src="{{asset('template/js/daterangepicker.js')}}" type="text/javascript"></script>
<script src="{{asset('template/js/datedropper.min.js')}}" type="text/javascript"></script>
<script src="{{asset('template/js/datedropper.min.js')}}" type="text/javascript"></script>
<script src="{{asset('template/js/spectrum.js')}}" type="text/javascript"></script>
<script src="{{asset('template/js/jscolor.js')}}" type="text/javascript"></script>
<script src="{{asset('template/js/jquery.minicolors.min.js')}}" type="text/javascript"></script>
<script src="{{asset('template/js/custom-picker.js')}}" type="text/javascript"></script>



<script src="{{asset('template/js/pcoded.min.js')}}" type="text/javascript"></script>
<script src="{{asset('template/js/vertical-layout.min.js')}}" type="text/javascript"></script>
{{--<script type="text/javascript" src="{{asset('template/js/custom-dashboard.min.js')}}"></script>--}}
<script type="text/javascript" src="{{asset('template/js/script.min.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/v/bs5/dt-1.13.4/b-2.3.6/b-html5-2.3.6/datatables.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
<script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>


<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13" type="text/javascript"></script>
<script type="text/javascript">
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-23581568-13');
</script>
<script src="{{asset('template/js/rocket-loader.min.js')}}" data-cf-settings="d2d1d6e2f87cbebdf4013b26-|49" defer=""></script></body>
</body>
<!-- Mirrored from colorlib.com/polygon/admindek/default/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 12 Dec 2019 16:08:25 GMT -->
</html>
