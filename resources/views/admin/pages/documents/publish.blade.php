@extends('templates.dashboard')

@if(Auth::user() instanceof App\Enseignant)

    @section('type-compte', 'Compte Enseignant')

    @section('title-page', 'Publications')

    @section('content-title', 'Toutes mes publications')

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
    <strong style="color:red">{{Auth::user()->name}}</strong> / Publications
    @endsection


    @section('publish_table')
        <!--div class="card-header"><i class="fas fa-table mr-1"></i>DataTable Example</div-->
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Titre</th>
                            <th>Auteur</th>
                            <th>Type</th>
                            <th>Domaine</th>
                            <th>Views</th>
                            <th>Gérer</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Titre</th>
                            <th>Auteur</th>
                            <th>Type</th>
                            <th>Domaine</th>
                            <th>Views</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach($documents as $doc)
                            <tr>
                                <!--Show document-->
                                <td><a href="{{route('document.prof.show',[encodeKey($doc->id)])}}">{{ $doc->title }}</a></td>
                                <!---->

                                <td>{{ $doc->author }}</td>
                                <td style="color : red">{{ $doc->getType->title }}</td>
                                <td style="color : #A88954">{{ $doc->getDomaine->title }}</td>
                                <td class="text-success">{{ $doc->views }}</td>

                                <!--Edit document-->
                                <td class="row ml-2">
                                    <a href="{{route('document.prof.edit',[encodeKey($doc->id)])}}"><button  class="mr-2 bg-success"><i class="material-icons">edit</i></button></a>
                                    <!---->
                                    <form action="{{route('document.prof.edit',[encodeKey($doc->id)])}}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" style="background-color: red;"><i class="material-icons">delete</i></button>
                                    </form>
                                </td>
                                <!---->
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        
    @endsection

@else

    @section('type-compte', 'Compte Etablissement')

    @section('content-title', 'Toutes vos publications')

    @section('home')
    href="{{route('admin.home')}}"
    @endsection

    @section('title-page', 'School | Faculty')

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
    <strong style="color:red">{{Auth::user()->title}}</strong> / Publications
    @endsection

    
    @section('publish_table')
        <!--div class="card-header"><i class="fas fa-table mr-1"></i>DataTable Example</div-->
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Titre</th>
                            <th>Auteur</th>
                            <th>Type</th>
                            <th>Domaine</th>
                            <th>Directors</th>
                            <th>Année</th>
                            <th>Gérer</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Titre</th>
                            <th>Auteur</th>
                            <th>Type</th>
                            <th>Domaine</th>
                            <th>Directors</th>
                            <th>Année</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach($documents as $doc)
                            <tr>
                                <!--Show document-->
                                <td><a href="{{route('document.admin.show',[encodeKey($doc->id)])}}">{{ $doc->title }}</a></td>
                                <!---->

                                <td>{{ $doc->author }}</td>
                                <td style="color : red">{{ $doc->getType->title }}</td>
                                <td style="color : #A88954">{{ $doc->getDomaine->title }}</td>
                                <td>@php
                                    echo str_replace('-',' & ',$doc->directors);
                                @endphp</td>
                                <td class="text-success">{{ $doc->year }}</td>
                                <td class="row ml-2">
                                    <!--Edit document-->
                                    <a href="{{route('document.admin.edit',[encodeKey($doc->id)])}}"><button class="mr-2 bg-success"><i class="material-icons">edit</i></button></a>
                                    <!---->

                                    <!--delete document-->
                                    <form action="{{route('document.admin.edit',[encodeKey($doc->id)])}}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button style="background-color: red;" type="submit"><i class="material-icons">delete</i></button>
                                    </form>
                                </td>
                                <!---->
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        
    @endsection
@endif
