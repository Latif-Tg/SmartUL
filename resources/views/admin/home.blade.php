@extends('templates.dashboard')

@section('type-compte', 'Compte Etablissement')

@section('content-title', 'Mon profil')

@section('home')
href="{{route('admin.home')}}"
@endsection

@section('title-page', 'School | Faculty')

@section('profil')
href="#"
@endsection


@section('account')
<h1>Mes informations</h1>
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
<strong style="color:red">{{Auth::user()->title}}</strong> / Account
@endsection

@section('infos')
    <div class="justify-content-center">
        <p><strong><i class="fa fa-user" aria-hidden="true"></i> Nom: </strong><span class="text-danger">{{Auth::user()->title}}</span></p><br/>
        <p><strong><i class="fas fa-location" aria-hidden="true"></i> Etablissement: </strong><span class="text-danger">{{Auth::user()->university}}</span></p>
        <br/><p><strong><i class="fa fa-envelope" aria-hidden="true"></i> Email: </strong><span class="text-danger">{{Auth::user()->email}}</span></p>
        <br/><p><strong><i class="fa fa-phone" aria-hidden="true"></i> Adresse: </strong><span class="text-danger">{{Auth::user()->adresse}}</span></p>
        <br/><p><strong><i class="fa fa-user-secret" aria-hidden="true"></i> Matricule: </strong><span class="text-danger">{{Auth::user()->register_fac}}</span></p>

    </div>
@endsection
