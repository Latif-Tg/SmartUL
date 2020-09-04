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
                </div>
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
    <p><h1>Détails d'une publication</h1></p><br/>
    <p>Les documents qui sont payants, vous les aurai après prise de contact avec le propriétaire ou le publicateur.</p>
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
                <div class="ml-1">
                    <div class="btn-group-lg my-3" style="text-align: center;">
                        
                    </div>
                    <h1 class="text-danger h3">{{ $document->title }}</h1>
                    <hr/>
                    <p><strong class="h4">Auteur : </strong><span class="text-dark h4">{{ $document->author }}</span></p>
                    <p><strong class="h4">Type : </strong><span class="text-dark h4">{{ $document->getType->title }}</span></p>
                    <p><strong class="h4">Domaine : </strong><span class="text-dark h4">{{ $document->getDomaine->title }}</span></p>
                    <p><strong class="h4">Publication de : </strong><span class="text-danger h4">{{getPublisher($document->publisherRole, encodeKey($document->idPublisher))}}</span></p>
                    <p><strong class="h4">Année de publication : </strong><span class="text-dark h4">{{$document->year}}</span></p>
                    <p><strong class="h4">Vues : </strong><span class="text-primary h4">{{ $document->views }}</span></p>
                    @if($document->directors)
                        <p><strong class="h4">Directeur(s) de rédaction : </strong><span class="text-primary h4">{{ $document->directors }}</span></p>
                    @endif
                    @if($document->summary)
                        <strong class="h4">Résumé : </strong><br/>
                        <p><span class="text-secondary">{{ $document->summary }}</span></p><br/>
                    @endif
                    <div class="mt-1">
                        @if($document->isPrivate)
                            <button class="btn btn-warning" data-toggle="modal" data-target="#contact">Acheter<i class="material-icons" style="float:left;">file_upload</i></button>
                        @else
                    <a href="{{asset('storage/'.$document->doc_path)}}" class="btn btn-danger">Télécharger<i class="material-icons" style="float:left;">file_upload</i></a>
                        @endif
                        <a href="{{route('documentation')}}" class="btn btn-dark">Retour à la documentation<i class="material-icons" style="float:left;">exit_to_app</i></a>
                        <button data-toggle="modal" data-target="#addComment" class="btn btn-secondary">Commenter la publication<i class="material-icons" style="float:left;">add</i></button>
                    </div>
                </div>    
            </div>
        </div>
    </div>

    <div class="modal fade" id="contact" tabindex="-1" role="dialog" aria-labelledby="dom_formTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-danger">
                    <h5 class="modal-title" id="dom_formTitle">CONTACTEZ POUR OBTENIR LE DOCUMENT</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Annuler">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body mt-5 mb-5">
                    <div class="container">
                        <!--DOMAINE TITLE-->
                        <div class="row">
                            <p><h2>Email :</h2><h2 class="text-danger"> {{getPublisherEmail($document->publisherRole, encodeKey($document->idPublisher))}}</h2></p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-dismiss="modal">Ok</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="addComment" tabindex="-1" role="dialog" aria-labelledby="addCommentTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-danger">
                    <h5 class="modal-title" id="typ_form_title">Commentaire</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Annuler">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                    <form action="{{route('comment',[encodeKey($document->id)])}}" method="post">
                        @csrf
                        <div class="modal-body mt-5 mb-5">
                            <div class="container">
                                <!-- -->
                                <div class="row">
                                    <span class="text-secondary">Votre commentaire</span>
                                    <textarea class="form-control" cols="10" name="content" rows="9">
                                        
                                    </textarea>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-secondary">Ajouter</button>
                            <button type="button" class="btn btn-light" data-dismiss="modal">Annuler</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('comments')
    <h1>Commentaires</h1><hr>
    @foreach($comments as $comment)
        <div class="card my-4">
            <span class="card-header text-danger">{{getAuthor(encodeKey($comment->author))}}</span>
            <div class="card-body">
                <p>{{$comment->comment}}</p>
            </div>
            <span class="card-footer text-right">{{$comment->create_at}}</span>
        </div>
    @endforeach

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