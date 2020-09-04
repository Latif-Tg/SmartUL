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

@section('deconnexion')

<li>
    <form method="post" action="{{ route('logout') }}">
        @csrf
        <!--a href="#">{{ __('Déconnection') }} </a-->
        <button class="btn" style="background-color:red; border-radius:0px;" type="submit">Déconnection</button>
    </form>
</li>
@endsection

@section('section-body')
<div class="container my-5">
    <h1>Mon profil</h1>
    <p><strong><i class="fa fa-user" aria-hidden="true"></i> Nom: </strong><span class="text-danger">{{Auth::user()->name}}</span></p>
    <br/><p><strong><i class="fa fa-envelope" aria-hidden="true"></i> Email: </strong><span class="text-danger">{{Auth::user()->email}}</span></p>
    <br/><p><strong><i class="fa fa-user-secret" aria-hidden="true"></i> Matricule: </strong><span class="text-danger">{{Auth::user()->num_carte}}</span></p>

</div>
@endsection
