<!DOCTYPE html>
<html lang="en">
<!-- Basic -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <!-- Site Metas -->
    <title>@yield('title')</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="#" type="{{asset('image/x-icon')}}" />
    <link rel="apple-touch-icon" href="#" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <!-- Pogo Slider CSS -->
    <link rel="stylesheet" href="{{asset('css/pogo-slider.min.css')}}">
    <!-- Site CSS -->
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="{{asset('css/responsive.css')}}">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{asset('css/custom.css')}}">
    

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!--Bootstrap CDN-->
    <!--link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"-->

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!--@author latif55 shabanabdoulatif@gmail.com-->
    <style type="text/css">
        .navbar-nav li a:hover {
            color: red;
        }
        .title {
            color: darkgreen;
        }
        a:hover {
            color: red;
        }
        .page-link {
            color: #d60500 !important;
        }
        .page-item.active .page-link {
            background-color: #d60500 !important;
            border-color: #d60500 !important;
            color: #FFF !important;
        }
        .hide {
            display: none;
        }
    </style>

</head>

<body id="home" data-spy="scroll" data-target="#navbar-wd" data-offset="98">

    <!-- LOADER -->
    <div id="preloader">
        <div class="loader">
            <img src="{{asset('images/loader.gif')}}" alt="#" />
        </div>
    </div>
    <!-- end loader -->
    <!-- END LOADER<img src="{{asset('images/logo.png')}}" alt="image"> -->
    
    <!-- Start header -->
    <header class="top-header">
        <nav class="navbar header-nav navbar-expand-lg">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{route('welcome_page')}}" style="line-height: 5px;">
                    <span class="h1 text-dark">S</span><span class="text-dark h3">mart</span><span class="text-danger h1">UL</span><br/>
                    <small class="text-muted" style="font-size: 11px;">Smart University Library</small>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-wd" aria-controls="navbar-wd" aria-expanded="false" aria-label="Toggle navigation">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbar-wd">
                    <ul class="navbar-nav">
                        <li><a class="nav-link" href="{{route('welcome_page')}}">Accueil</a></li>
                        <li><a class="nav-link" href="{{route('documentation')}}">Documentation</a></li>
                        <li><a class="nav-link" href="">Contact Us</a></li>
                        
                        @guest
                            <li><a class="nav-link" href="{{route('getLoginChoice')}}">Se connecter</a></li>
                            @if (Route::has('register'))
                                <li><a class="nav-link text-danger" style="background:#fff;" href="{{route('welcome_page')}}#compte">S'inscrire</a></li>
                            @endif
                        @else
                                @yield('deconnexion')
                                @if(Auth::check())
                                    <li><a href="{{route('home')}}" title="My account"><i style="height: 5px;background-color:dark;" class="fa fa-user mt-3 h2"></i></a></li>
                                @endif
                        @endguest
                    </ul>
                </div>
                @yield('search')
            </div>
        </nav>
    </header>
    <!-- End header -->

    <!-- Start Banner -->
    @yield('banner')
    
    <!-- End Banner -->
    
    <div class="section layout_padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="full center">
                        <div class="heading_main text_align_center">
                            @yield('section-info-title')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- section -->
    <div class="section layout_padding theme_bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 text_align_center">
                    <div class="full">
                    @yield('background-img')
                    </div>
                </div>
                @yield('section-info-content')
            </div>
        </div>
    </div>
    <!-- end section -->

    <!-- section -->
    @yield('publicity')
    <!-- end section -->

    <!-- section -->
    @yield('section-body')
    <!-- end section -->

    <!-- section -->
    <div class="section layout_padding">
        <div class="container">
            <div class="row">

                @yield('others')

            </div>
            @yield('comments')
        </div>
    </div>
    <!-- end section -->

    <!-- Start Footer -->
    <footer class="footer-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="logo">
                        <!--a href="index.html"><img src="{{asset('images/footer_logo.png')}}" alt="#" /></a-->
                    </div>
                </div>
                <div class="col-lg-12 white_fonts">
                    <h4 class="text-align">Contact Us</h4>
                </div>
                <div class="margin-top_30 col-md-8 offset-md-2 white_fonts">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="full icon text_align_center">
                                <img src="{{asset('images/social1.png')}}">
                            </div>
                            <div class="full white_fonts text_align_center">
                                <p>Lomé - Agoè Atsanvé
                                    <br>TOGO - (Afrique Occidentale)</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="full icon text_align_center">
                                <img src="{{asset('images/social2.png')}}">
                            </div>
                            <div class="full white_fonts text_align_center">
                                <p>shabanabdoulatif@gmail.com<br>soulemanaabdoufadel@gmail.com</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="full icon text_align_center">
                                <img src="{{asset('images/social3.png')}}">
                            </div>
                            <div class="full white_fonts text_align_center">
                                <p>+22891516886</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="row white_fonts margin-top_30">
                <div class="col-lg-12">
                    <div class="full">
                        <div class="center">
                            <ul class="social_icon">
                                <li><a href="#"><i class="fa fa-facebook-f"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- End Footer -->

    <div class="footer_bottom">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <p class="crp">© 2019 CIC/UL Students . All Rights Reserved. Powered by L&CO 2019</p>
                    <ul class="bottom_menu">
                        <li><a href="contact.html">Contact us</a></li>
                        <li><a href="#">Terms of Service</a></li>
                        <li><a href="#">Privacy</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <a href="#" id="scroll-to-top" class="hvr-radial-out"><i class="fa fa-angle-up"></i></a>
    @yield('scripts')
    @include('sweetalert::alert')
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> --}}
    <!-- ALL JS FILES -->
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/popper.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <!-- ALL PLUGINS -->
    <script src="{{asset('js/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{asset('js/jquery.pogo-slider.min.js')}}"></script>
    <script src="{{asset('js/slider-index.js')}}"></script>
    <script src="{{asset('js/smoothscroll.js')}}"></script>
    <script src="{{asset('js/form-validator.min.js')}}"></script>
    <script src="{{asset('js/contact-form-script.js')}}"></script>
    <script src="{{asset('js/isotope.min.js')}}"></script>
    <script src="{{asset('js/images-loded.min.js')}}"></script>
    <script src="{{asset('js/custom.js')}}"></script>
</body>

</html>