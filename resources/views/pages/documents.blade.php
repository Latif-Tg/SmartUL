@extends('templates.template')

@section('title')

SmartLU - Documents

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

@section('section-info-title')
<p class="large text-uppercase"><span class="large"><span class="theme_color">Pluisieurs</span> types de documents</span></p>
@endsection

@section('background-img')
<img class="img-responsive" src="{{asset('images/resume_img.png')}}" alt="#" />
@endsection
@section('section-info-content')
<div class="col-lg-6 col-md-6 col-sm-12 white_fonts"  id="compte">
    <h3 class="small_heading">Vous avez qu'à trier pour retrouver les documents de votre choix</h3></p>
    <p>Vous découvrirez une panoplie de sujets intéressants, 
    <br>à lire et qui vous inspireront
    dans vos divers cursus au campus.</p>
    <p>Inspirez vous de ces documents et trouver parmi ces sujets,<br/>un qui vous intéresse et améliorer
    la solution ou soyez inspirer et apporter<br/> de nouvelles problématiques auxquelles
    vous apporterez des solutions pour vos thèses et soutenances.</p>
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
                            <p class="large">Documentation</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div id="demo" class="container-fluid row">
                        <div class="col-lg-3">
                            <div class="container-fluid card  text-center mb-4 p-5">
                                <strong class="text-danger pl-1">Types</strong>
                                <hr/>
                                <ul style="font-weight: bold;">
                                    <form id="form-type">
                                        @foreach($types as $type)
                                        <li>
                                            <input type="radio" onclick="sortByType(value)" name="typeSearch" value="{{$type->title}}" id="{{$type->title}}" /> <label for="{{$type->title}}">{{$type->title}}</label><br />
                                        </li>
                                        @endforeach
                                    </form>
                                    <button onclick="LoadMoreTypes()" class="btn btn-outline-dark btn-sm mt-5">Plus....<i class="large material-icons" style="float: left;">add_circle</i></button>
                                </ul>
                            </div>
                            <div class="container-fluid card text-center mb-4 p-5">
                                <strong class="text-danger pl-1">Domaines</strong>
                                <hr/>
                                <ul style="font-weight: bold;">
                                    <form id="form-domaine">
                                        @foreach($domaines as $domaine)
                                        <li>
                                            <input type="radio" onclick="sortByDomaine(value)" name="domaineSearch" value="{{$domaine->title}}" id="{{$domaine->title}}" /> <label for="{{$domaine->title}}">{{$domaine->title}}</label><br />
                                        </li>
                                        @endforeach
                                    </form>
                                    <button class="btn btn-outline-dark btn-sm mt-5" onclick="LoadMoreDom()">Plus....<i class="large material-icons" style="float: left;">add_circle</i></button>
                                </ul>
                            </div>
                            <div class="container-fluid card text-center mb-4 p-5">
                                 <strong class="text-danger pl-1">Année</strong>
                                 <hr style="color: red;" height="100%"/>
                                <ul style="font-weight: bold;">
                                    <form id="form-year">
                                    @foreach($years as $year)
                                        
                                        <li>
                                            <input type="radio" onclick="sortByYear(value)" name="year" value="{{$year->year}}"/> <label>{{$year->year}}</label><br />
                                        </li>
                                    @endforeach
                                    </form>
                                    <button class="btn btn-outline-dark btn-sm mt-5">Plus....<i class="large material-icons" style="float: left;">add_circle</i></button>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-9">
                            <h5 id="nav-doc" class="alert alert-danger">
                                <span id="nav-type">
                                    <span id="all-type" class="badge badge-pill badge-secondary h1">
                                        Type
                                        <span>&nbsp</span>
                                        <button class="badge badge-pill badge-danger pl-1" onclick="hideAllType()">&times</button>
                                    </span>
                                </span>
                                <span id="nav-domaine">
                                    <span id="all-domaine" class="badge badge-pill badge-secondary h1">
                                        Domaine
                                        <span>&nbsp</span>
                                        <button class="badge badge-pill badge-danger pl-1" onclick="hideAllDomaine()">&times</button>
                                    </span>
                                </span>
                                <span id="nav-year">
                                    <span id="all-year" class="badge badge-pill badge-secondary h1">
                                        Année
                                        <span>&nbsp</span>
                                        <button class="badge badge-pill badge-danger pl-1" onclick="hideAllYear()">&times</button>
                                    </span>
                                </span>
                            </h5>
                            <div id="liste_docs">
                                
                                @foreach($documents as $document)
                                <div class="row pl-5">
                                    <div class="mt-5">
                                        <div class="row">
                                            <img src="/images/icons/icon-doc.png" height="160px" width="150px"/>
                                            <div>
                                                <span class="text-dark strong">Titre: </span>
                                                <span class="text-danger h6 ml-3">{{ $document->title }}</span><br/>
                                                <span class="text-dark strong">Domaine: </span>
                                                <span class="text-dark h6 ml-2">{{ $document->getDomaine->title }}</span><br/>
                                                <span class="text-dark strong">Auteur: </span>
                                                <span class="text-danger h6 ml-3">{{ $document->author }}</span><br/>
                                                <span class="text-dark strong">Type: </span>
                                                <span class="text-dark h6 ml-3">{{ $document->getType->title }}</span><br/>
                                                <a class="text-primary" href="{{route('showDocDetails',[($document->id)])}}">Détails</a><hr/>
                                            </div>
                                        </div>
                                        @if($document->summary)
                                            <!--div class="col-lg-6 col-xs-9">
                                                <smalll class="text-dark">Résumé</smalll>
                                                <p class="col-lg-4 col-md-2 col-sm-1 text-sm-left text-truncate">{{ $document->summary }}LoremLorem LoremLoremLorem</p>
                                            </div-->
                                        @endif
                                    </div><br/>
                                </div>
                                @endforeach
                            </div>
                            
                        </div>
                        
                    </div>
                </div>

                <div class="col-lg-12">
                    <div class="full center">
                        <span>{{$documents->links()}}</span>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
@section('scripts')
<script src="{{asset('js/myapp.js')}}"></script>
<script type="text/javascript">
    function LoadMoreTypes() {
        $('#form-type').fadeOut("slow");
        $.get("{{URL::to('smart_UL/get-more-type')}}", function(data) {
            $('#form-type').html("");
            $.each(data, function(i,value) {
                let li = document.createElement('li');
                let input = document.createElement('input');
                let label = document.createElement('label');
                let labelText = document.createTextNode(value.title); 
                let space = document.createTextNode(" ");
                let br = document.createElement('br');

                input.type = 'radio';
                input.name = 'typeSearch';
                input.id = value.title;
                input.addEventListener('click',function(e){
                    sortByType(value.title);
                },false);

                label.setAttribute('for',value.title);

                label.appendChild(labelText);
                
                li.appendChild(input);
                li.appendChild(space)
                li.appendChild(label);
                li.appendChild(br);

                $('#form-type').append(li);

            });
        });
        $('#form-type').fadeIn("slow");
    }

    function LoadMoreDom() {
        $('#form-domaine').fadeOut("slow");

        $.get("{{route('moreDomaine')}}", function(domaines) {
            $('#form-domaine').html("");
            $.each(domaines, function(i,value) {
                let li = document.createElement('li');
                let input = document.createElement('input');
                let label = document.createElement('label');
                let labelText = document.createTextNode(value.title); 
                let space = document.createTextNode(" ");
                let br = document.createElement('br');

                input.type = 'radio';
                input.name = 'domaineSearch';
                input.id = value.title;
                input.addEventListener('click',function(e){
                    sortByDomaine(value.title);
                },false);

                label.setAttribute('for',value.title);

                label.appendChild(labelText);
                
                li.appendChild(input);
                li.appendChild(space)
                li.appendChild(label);
                li.appendChild(br);

                $('#form-domaine').append(li);
            });
        });
        $('#form-domaine').fadeIn("slow");
    }

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    

</script>
@endsection