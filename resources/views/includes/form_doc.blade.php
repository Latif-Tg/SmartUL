<div class="mb-5">

    @csrf
    @if(Auth::user() instanceof App\Faculty)
        <small style="color: red" class="mt-5 alert alert-danger">**Les champs "Directeurs mémoire/thèse" et "Année Scolaire" concernent juste les mémoires, thèse ou autre documents de ce genre</small>
    @endif
    <div class="input-group input-group-sm mt-5">
    
        <!--title du document-->
        <label for="title" class="mr-1 h5">Titre</label>
        <div class="input-group-prepend">
            <button class="input-group-text"><i class="fa fa-file" aria-hidden="true" style="color: rgb(202, 0, 0)"></i></button>
        </div>
        <input type="text" id="title" class="form-control mr-2 @error('title') is-invalid @enderror" value="{{old('title') ?? $document->title}}" required  name="title">
        
        
        <!--author du document-->
        <label for="author" class="mr-1 h5">Auteur</label>
        <div class="input-group-prepend">
            <button class="input-group-text"><i class="material-icons smart" aria-hidden="true">face</i></button>
        </div>
        <input type="text" id="author" class="form-control mr-2 @error('author') is-invalid @enderror" value="{{old('author') ?? $document->author}}" required  name="author">
    
    </div>

    <div class="input-group input-group-sm mt-5">
        <!--type du document-->
        <label for="type" class="mr-1 h5">Type</label>
        <div class="input-group-prepend">
            <button class="input-group-text"><i class="material-icons smart" aria-hidden="true">check_circle</i></button>
        </div>
        <select id="type" name="type" class="custom-select mr-2 @error('type') is-invalid @enderror">
            <option>Choisir un type</option>
            @foreach($types as $type)
                <option value="{{$type->id}}" {{$document->type == $type->id ? 'selected' : ''}} >{{$type->title}}</option>
            @endforeach
        </select>

        <!--domaine-->
        
        <label for="domain" class="mr-1 h5">Domaine </label>
        <div class="input-group-prepend">
            <button class="input-group-text"><i class="material-icons smart">filter_frames</i></button>
        </div>
        <select id="domain" name="domaine" class="custom-select mr-2 @error('domaine') is-invalid @enderror">
            <option>Sélectionnez un domaine</option>
            @foreach($domaines as $domain)
                <option value="{{$domain->id}}" {{$document->domaine == $domain->id ? 'selected' : ''}}>{{$domain->title}}</option>
            @endforeach
        </select>

    </div>

    <div class="input-group input-group-sm mt-5">
        
        <!--document payant ou non-->
        <div class="custom-control custom-radio custom-control-inline">
            <input id="coutant" type="radio" name="isPrivate" value="1" class="custom-control-input @error('isPrivate') is-invalid @enderror"/>
            <label for="coutant" class="custom-control-label h5">Payant</label>
        </div>

        <div class="custom-control custom-radio custom-control-inline">
            <input id="non_coutant" type="radio" name="isPrivate" value="0" class="custom-control-input  @error('isPrivate') is-invalid @enderror"/>
            <label for="non_coutant" class="custom-control-label h5">Libre</label>
        </div>

        <!--envoi du document-->
        <div class="custom-file">
            <input type="file" class="custom-file-input @error('file') is-invalid @enderror" id="file" name="file"/>
            <label for="file" class="custom-file-label">Document</label>
        </div>
        
    </div>
    
    
    @if(Auth::user() instanceof App\Faculty)
    <div class=" container input-group input-group-sm mt-5">
        <!--directors du document-->
        <label for="director" class="mr-1 h5">Directeurs mémoire/thèse</label>
        <div class="input-group-prepend">
            <button class="input-group-text" onclick="alert('Séparer les noms des directeurs avec -')"><i class="material-icons smart smart">group</i></button>
        </div>
        <input type="text" placeholder="Directeur1-Directeur2-..." id="director" class="form-control mr-2 @error('director') is-invalid @enderror" value="{{old('director') ?? $document->directors}}" name="director">

        <!--année de soutenance-->
        <label for="director" class="mr-1 h5">Année Scolaire</label>
        <div class="input-group-prepend">
            <button class="input-group-text" ><i class="material-icons smart">date_range</i></button>
        </div>
        <input type="text" placeholder="Année de soutenance..." id="year" class="form-control mr-2 @error('year') is-invalid @enderror" value="{{old('year') ?? $document->year}}"  name="year">

    </div>
        
    @endif

    <div class=" container input-group input-group-sm mt-5">
        <!--Summary -->
        <label class="mr-5 h5">Résumé</label>
        <textarea class="form-control" cols="10" name="summary" rows="9">
            {{null ?? $document->summary}}
        </textarea>
    </div>

    <br/>

</div>