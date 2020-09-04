@extends('/pages.menu')
@section('contenu')
<div class="container-fluid py-5">
    <h1>Resultat pour "<small class="text-secondary">{{ $search }}</small>"</h1>
    <table class="table my-5">
        <thead>
            <tr>
                <th scope="row">#</th>
                <th></th>
                <th scope="col">Titre</th>
                <th scope="col">Auteur</th>
                <th scope="col">Type</th>
                <th scope="col">Domaine</th>
                <th scope="col">Date d'ajout</th>
                <th scope="col">Date de modification</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($liste as $doc)
                <tr>
                <th scope="row">{{ $doc->id }}<th>
                <td><a href="/admin/pages/documents/{{$doc->id}}">{{ $doc->titre }}</a></td>
                <td>{{ $doc->auteur }}</td>
                <td style="color : red">{{ $doc->type->libelle }}</td>
                <td style="color : #A88954">{{ $doc->domaine->libelle }}</td>
                <td>{{ $doc->created_at }}</td>
                <td>{{ $doc->updated_at }}</td>
                <td><a href="/admin/pages/documents/{{$doc->id}}/edit" class="btn btn-secondary">Modifier</a></td>
                <td>
                    <form action="/admin/pages/documents/{{$doc->id}}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger">Supprimer</button>
                    </form>
                </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection