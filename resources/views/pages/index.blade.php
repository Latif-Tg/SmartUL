@extends('templates.template')

@section('title')

SmartLU - Smart University Library

@endsection

@section('search')
<form class="search-box" style="position:fixed; top: -10px;">
    <input type="text" class="search-txt" placeholder="Presser Entrée pour rechercher">
    <a class="search-btn">
        <img src="{{asset('images/search_icon.png')}}" alt="#" />
    </a>
</form>
@endsection

@section('banner')
<div class="ulockd-home-slider">
    <div class="container-fluid">
        <div class="row">
            <div class="pogoSlider" id="js-main-slider">
                <div class="pogoSlider-slide" style="background-image:url({{asset('images/library.jpg')}});">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="slide_text">
                                    <h3><span class="theme_color">Smart</span> University Library</h3><br/>
                                    <h4 class="text-xs-l55" style="color: white;">Créer un compte et commencer par lire
                                    les connaissances et <br/>expériences rédigées et partager avec vous sur cette plateforme.</h4>
                                    <br>
                                    <p>Vous découvrirez une panoplie de sujets intéressants, 
                                    <br>à lire et qui vous inspireront
                                    dans vos divers cursus au campus.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="pogoSlider-slide" style="background-image:url({{asset('images/slider-01.jpg')}});">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="slide_text">
                                    <h3><span>Vous êtes</span><span class="theme_color"> un étudiant!</span></h3>
                                    <br>
                                    <h4>Vous découvrirez ici des sujets déjà traités,<br/>des problématiques abordés autrement.</h4>
                                    <br>
                                    <p>Inspirez vous de ces documents et trouver parmi ces sujets,<br/>un qui vous intéresse et améliorer
                                    la solution ou soyez inspirer et apporter<br/> de nouvelles problématiques auxquelles
                                    vous apporterez des solutions pour vos thèses et soutenances.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div-->
            </div>
        </div>
    </div>
</div>
@endsection

@section('join-us')
@guest
    <li><a class="nav-link" href="{{route('getLoginChoice')}}">Se connecter</a></li>
    @if (Route::has('register'))
        <li><a class="nav-link text-danger" style="background:#fff;" href="#compte">S'inscrire</a></li>
    @endif
@else
    <div class="">
        <li>
            <form method="post" action="{{ route('logout') }}">
                @csrf
                <!--a href="#">{{ __('Déconnection') }} </a-->
                <button class="btn btn-danger" type="submit">Déconnection</button>
            </form>
        </li>
    </li>
@endguest
<!--li><a class="nav-link" href="{{route('getLoginChoice')}}">Se connecter</a></li>
<li><a class="nav-link text-danger" style="background:#fff;" href="#compte">S'inscrire</a></li-->
@endsection

@section('section-info-title')
<p class="large text-uppercase"><span class="large"><span class="theme_color">vous avez trois</span> types de compte</span></p>
@endsection


@section('background-img')
<img class="img-responsive" src="{{asset('images/resume_img.png')}}" alt="#" />
@endsection
@section('section-info-content')
<div class="col-lg-6 col-md-6 col-sm-12 white_fonts"  id="compte">
    <h3 class="small_heading">Créer un compte en choisissant le type de compte</h3></p>
    <p>Vous découvrirez une panoplie de sujets intéressants, 
    <br>à lire et qui vous inspireront
    dans vos divers cursus au campus.</p>
    <p>Inspirez vous de ces documents et trouver parmi ces sujets,<br/>un qui vous intéresse et améliorer
    la solution ou soyez inspirer et apporter<br/> de nouvelles problématiques auxquelles
    vous apporterez des solutions pour vos thèses et soutenances.</p>
    <a href="{{route('register')}}" class="hvr-radial-out button-theme text-uppercase space_btn">étudiant</a>
    <a href="{{route('admin.register')}}" class="hvr-radial-out button-theme text-uppercase space_btn">faculté</a>
    <a href="{{route('professionnal.register')}}" class="hvr-radial-out button-theme text-uppercase">enseignant</a>
</div>
@endsection

@section('publicity')

    <div class="section layout_padding">
        <div class="container">

            <div class="row">
                <div class="col-md-12">
                    <div class="full center margin-bottom_30">
                        <div class="heading_main text_align_center">
                            <h2><span class="theme_color text-uppercase"></span></h2>
                            <p class="large">Publicité</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div id="demo" class="carousel slide" data-ride="carousel">

                        <!-- The slideshow -->
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <div class="row">
                                    <div class="col-lg-3 col-md-6 col-sm-12">
                                        <img class="img-responsive" src="{{asset('images/img1.png')}}" alt="#" />
                                    </div>
                                    <div class="col-lg-3 col-md-6 col-sm-12">
                                        <img class="img-responsive" src="{{asset('images/img2.png')}}" alt="#" />
                                    </div>
                                    <div class="col-lg-3 col-md-6 col-sm-12">
                                        <img class="img-responsive" src="{{asset('images/img3.png')}}" alt="#" />
                                    </div>
                                    <div class="col-lg-3 col-md-6 col-sm-12">
                                        <img class="img-responsive" src="{{asset('images/img4.png')}}" alt="#" />
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="row">
                                    <div class="col-lg-3 col-md-6 col-sm-12">
                                        <img class="img-responsive" src="{{asset('images/img1.png')}}" alt="#" />
                                    </div>
                                    <div class="col-lg-3 col-md-6 col-sm-12">
                                        <img class="img-responsive" src="{{asset('images/img2.png')}}" alt="#" />
                                    </div>
                                    <div class="col-lg-3 col-md-6 col-sm-12">
                                        <img class="img-responsive" src="{{asset('images/img3.png')}}" alt="#" />
                                    </div>
                                    <div class="col-lg-3 col-md-6 col-sm-12">
                                        <img class="img-responsive" src="{{asset('images/img4.png')}}" alt="#" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#demo" data-slide="prev">
                            <span class="carousel-control-prev-icon"></span>
                        </a>
                        <a class="carousel-control-next" href="#demo" data-slide="next">
                            <span class="carousel-control-next-icon"></span>
                        </a>

                    </div>
                </div>

                <div class="col-lg-12">
                    <p>Lorem</p>
                </div>

                <div class="col-lg-12">
                    <div class="full center">
                        <a href="about.html" class="hvr-radial-out button-theme" style="color: white;">Plus d'infos</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

@section('section-body')
<div class="section layout_padding theme_bg">
        <div class="container">
            <div class="row">

                <div class="col-lg-6 col-md-6 col-sm-12 white_fonts">
                    <h3 class="small_heading">Consulter la documentation</h3>
                    <p>Découvrez de nouveaux horizons, des sujets traités, des projets inachevés, et construisez vous.</p>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ea magnam quas rem sit. 
                        Reiciendis debitis voluptatum, aut est labore quae eius accusantium
                         sapiente maxime eum beatae dolorum vitae amet doloremque?</p>
                        <p><a href="about.html" class="hvr-radial-out button-theme">Read more ></a></p>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-12 text_align_center">
                    <div class="full">
                        <img class="img-responsive" src="{{asset('images/resume_img2.png')}}" alt="#" />
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('others')
{{--     <div class="col-lg-4 col-md-4 col-sm-12">
        <div class="full">
            <div class="center">
                <img src="{{asset('images/icon1.png')}}" alt="#" />
            </div>
            <div class="center">
                <h4>Responsive CV Templates</h4>
            </div>
        </div>
    </div>

    <div class="col-lg-4 col-md-4 col-sm-12">
        <div class="full">
            <div class="center">
                <img src="{{asset('images/icon2.png')}}" alt="#" />
            </div>
            <div class="center">
                <h4>Designed for Professionals</h4>
            </div>
        </div>
    </div>

    <div class="col-lg-4 col-md-4 col-sm-12">
        <div class="full">
            <div class="center">
                <img src="{{asset('images/icon3.png')}}" alt="#" />
            </div>
            <div class="center">
                <h4>Faster. interview calls</h4>
            </div>
        </div>
    </div>

    <div class="col-lg-10 offset-lg-1 margin-top_30">
        <div class="full text_align_center">
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the scrambled it to make a type specimen book. It has survived not only fiv</p>
        </div>
    </div> --}}
@endsection