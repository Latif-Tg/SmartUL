@extends('templates.dashboard')

@if(Auth::user() instanceof App\Enseignant)

    @section('type-compte', 'Compte Enseignant')

    @section('title-page', 'Document')

    @section('content-title', 'Document Details')

    @section('home')
    href="{{route('professionnal.home')}}"
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
    <strong style="color:red">{{Auth::user()->name}}</strong>/{{$document->title}}
    @endsection


    @section('publish_table')
       <div class="ml-1">
            <div class="btn-group-lg my-3" style="text-align: center;">
                
            </div>
            <h1 class="text-primary">{{ $document->title }}</h1>
            <hr/>
            <p><strong>Auteur : </strong><span class="text-secondary">{{ $document->author }}</span></p>
            <p><strong>Type : </strong><span class="text-secondary">{{ $document->getType->title }}</span></p>
            <p><strong>Mot Clés : </strong><span class="text-secondary">{{ $document->keyword }} </span></p>
            <p><strong>Domaine : </strong><span class="text-secondary">{{ $document->getDomaine->title }}</span></p>
            <p>
                <strong>Document payant: </strong><span class="text-secondary">
                <?php 
                    if( ( $document->isPrivate ) == 1 ){
                ?>
                Oui
                <?php 
                    }
                    else {
                ?>
                Non
                <?php
                    }
                ?></span>
            </p>
            <p><strong>Résumé : </strong><span class="text-secondary">{{ $document->summary }}</span></p>
            <p><strong>Date d'ajout : </strong><span class="text-secondary">{{ $document->created_at }}</span></p>
            <p><strong>Dernière modification : </strong><span class="text-secondary">{{ $document->updated_at }}</span></p>
        </div>
        
    @endsection

@else
@section('type-compte', 'Compte Faculté/Ecole')

    @section('title-page', 'Document')

    @section('content-title', 'Document Details')

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
    <strong style="color:red">{{Auth::user()->title}}</strong> / {{$document->title}}
    @endsection

    
    @section('publish_table')
         <div class="ml-1">
            <div class="btn-group-lg my-3" style="text-align: center;">
                
            </div>
            <h1 class="text-primary">{{ $document->title }}</h1>
            <hr/>
            <p><strong>Auteur : </strong><span class="text-secondary">{{ $document->author }}</span></p>
            <p><strong>Type : </strong><span class="text-secondary">{{ $document->getType->title }}</span></p>
            <p><strong>Mot Clés : </strong><span class="text-secondary">{{ $document->keyword }} </span></p>
            <p><strong>Domaine : </strong><span class="text-secondary">{{ $document->getDomaine->title }}</span></p>
            <p>
                <strong>Document payant: </strong><span class="text-secondary">
                <?php 
                    if( ( $document->isPrivate ) == 1 ){
                ?>
                Oui
                <?php 
                    }
                    else {
                ?>
                Non
                <?php
                    }
                ?></span>
            </p>
            <p><strong>Résumé : </strong><span class="text-secondary">{{ $document->summary }}</span></p>
            <p><strong>Date d'ajout : </strong><span class="text-secondary">{{ $document->created_at }}</span></p>
            <p><strong>Dernière modification : </strong><span class="text-secondary">{{ $document->updated_at }}</span></p>
        </div>
        
    
    @endsection
@endif