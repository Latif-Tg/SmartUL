@extends('templates.dashboard')

@if(Auth::user() instanceof App\Enseignant)

    @section('type-compte', 'Compte Enseignant')

    @if($infos[0] instanceof App\Domaine)
    {
        @section('content-title', 'Domaines')
        @section('title-page', 'Domaines')
    }
    @else{
        @section('content-title', 'Types')
        @section('title-page', 'Types')
    }
    @endif

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
    <strong style="color:red">{{Auth::user()->name}}</strong> / Informations
    @endsection


    @section('publish_table')
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Titre</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($infos as $info)
                        <tr>
                            <td class="text-success">{{ $info->title }}</td>
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

    @section('home')
    href="{{route('admin.home')}}"
    @endsection

    @if($infos[0] instanceof App\Domaine)
    {
        @section('content-title', 'Domaines')
        @section('title-page', 'Domaines')
    }
    @else{
        @section('content-title', 'Types')
        @section('title-page', 'Types')
    }
    @endif

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
    <strong style="color:red">{{Auth::user()->title}}</strong> / Informations
    @endsection

    
    @section('publish_table')
        <!--div class="card-header"><i class="fas fa-table mr-1"></i>DataTable Example</div-->
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Titre</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($infos as $info)
                            <tr>
                                <td class="text-success">{{ $info->title }}</td>
                                <!---->
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        
    @endsection
@endif
