@csrf
<!--libelle du type-->
<div class="form-group">
    <label for="title" class="h5">Libellé</label>
    <input type="text" id="title" class="form-control @error('libelle') is-invalid @enderror" value="{{old('libelle') ?? $type->libelle}}" name="libelle">
</div>
@error('libelle')
<div class="invalid-feedback">
    {{ $errors->first('libelle') }}
</div>
@enderror