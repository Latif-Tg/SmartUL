@extends('templates.dashboard')
@if(Auth::user() instanceof App\Enseignant)
        
    @section('title-page', 'Professeur | Update')

    @section('type-compte', 'Compte Enseignant')

    @section('content-title', 'Modification d\'une publication')

    @section('home')
    href="{{route('professionnal.home')}}"
    @endsection

    @section('deconnect')
    href="{{ route('logout') }}"
    onclick="event.preventDefault();
    document.getElementById('logout-form').submit();"
    @endsection
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>

    @section('location')
    <strong style="color:red">{{Auth::user()->name}}</strong> / Mise à jour de la publication
    @endsection

@else
    @section('title-page', 'Faculty | Update')

    @section('type-compte', 'Compte Etablissement')

    @section('content-title', 'Modification d\'une publication')

    @section('home')
    href="{{route('admin.home')}}"
    @endsection

    @section('profil')
    href="#"
    @endsection

    @section('deconnect')
    href="{{ route('logout') }}"
    onclick="event.preventDefault();
    document.getElementById('logout-form').submit();"
    @endsection
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>

    @section('location')
    <strong style="color:red">{{Auth::user()->title}}</strong> / Mise à jour de la publication
    @endsection

@endif

@section('account')
<h1>Modifier une publication</h1><hr/>
@if(Auth::user() instanceof App\Faculty)
    <form method="post" action="{{route('document.admin.edit',[encodeKey($document->id)])}}" enctype="multipart/form-data">
        <div class="container">
            @method('patch')
            @include('/includes.form_doc')

            <div class="text-right">
                <button type="submit" class="btn btn-dark">Enregistrer<i class="material-icons" style="float:left;">file_upload</i></button>
                <button type="reset" class="btn btn-danger">Annuler<i class="material-icons" style="float:left;">exit_to_app</i></button>
            </div>
        </div>
        
    </form>
@else
    <form method="post" action="{{route('document.prof.edit',[encodeKey($document->id)])}}" enctype="multipart/form-data">
        <div class="container">
            @method('patch')
            @include('/includes.form_doc')

            <div class="text-right">
                <button type="submit" class="btn btn-dark">Enregistrer<i class="material-icons" style="float:left;">file_upload</i></button>
                <button type="reset" class="btn btn-danger">Annuler<i class="material-icons" style="float:left;">exit_to_app</i></button>
            </div>
        </div>
        
    </form>
@endif
<div class="btn-group-lg my-5" style="text-align: center;">
    
    <button class="btn btn-secondary mt-3" data-toggle="modal" data-target="#dom_form">
        Nouveau Domaine<i class="material-icons" style="float:left">list</i>
    </button>

    <button class="btn btn-warning mt-3" data-toggle="modal" data-target="#typ_form">
       Nouveau Type<i class="material-icons" style="float:left">loupe</i>
    </button>
</div><br/><br/>

<div class="modal fade" id="dom_form" tabindex="-1" role="dialog" aria-labelledby="dom_formTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h5 class="modal-title" id="dom_formTitle">NOUVEAU DOMAINE</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Annuler">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @if(Auth::user() instanceof App\Enseignant)
                <form action="{{route('pro_new_domaine')}}" method="post">
                    @csrf
                    <div class="modal-body mt-5 mb-5">
                        <div class="container">
                            <!--DOMAINE TITLE-->
                            <div class="row">
                                <span class="text-secondary">Domaine</span>
                                <input class="form-control" name="title" type="text"/>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-secondary">Ajouter</button>
                        <button type="button" class="btn btn-light" data-dismiss="modal">Annuler</button>
                    </div>
                </form>
            @else
                <form action="{{route('fac_new_domaine')}}" method="post">
                    @csrf
                    <div class="modal-body mt-5 mb-5">
                        <div class="container">
                            <!--DOMAINE TITLE-->
                            <div class="row">
                                <span class="text-secondary">Domaine</span>
                                <input class="form-control" name="title" type="text"/>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-secondary">Ajouter</button>
                        <button type="button" class="btn btn-light" data-dismiss="modal">Annuler</button>
                    </div>
                </form>
            @endif

        </div>
    </div>
</div>

<div class="modal fade" id="typ_form" tabindex="-1" role="dialog" aria-labelledby="typ_form_title" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h5 class="modal-title" id="typ_form_title">NOUVEAU TYPE</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Annuler">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @if(Auth::user() instanceof App\Enseignant)
                <form action="{{route('pro_new_type')}}" method="post">
                    @csrf
                    <div class="modal-body mt-5 mb-5">
                        <div class="container">
                            <!--TYPE TITLE-->
                            <div class="row">
                                <span class="text-secondary">Type</span>
                                <input class="form-control" name="title" type="text"/>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-secondary">Ajouter</button>
                        <button type="button" class="btn btn-light" data-dismiss="modal">Annuler</button>
                    </div>
                </form>
            @else
                <form action="{{route('fac_new_type')}}" method="post">
                    @csrf
                    <div class="modal-body mt-5 mb-5">
                        <div class="container">
                            <!--TYPE TITLE-->
                            <div class="row">
                                <span class="text-secondary">Type</span>
                                <input class="form-control" name="title" type="text"/>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-secondary">Ajouter</button>
                        <button type="button" class="btn btn-light" data-dismiss="modal">Annuler</button>
                    </div>
                </form>
            @endif
        </div>
    </div>
</div>
@endsection