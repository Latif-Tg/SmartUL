@extends('layouts.register_layout')

@section('who')
établissement
@endsection

@section('route_register')
{{ route('admin.register') }}
@endsection

@section('type')
<span style="color: rgb(0,100,0)"> établissement</span>
@endsection

@section('mat')

<div class="wrap-input100 validate-input" data-validate = "Your matricule is required: ex@abc.xyz">

    <input id="matricule" type="text" placeholder="Matricule" class="input100 @error('register_fac') is-invalid @enderror" name="register_fac" value="{{ old('register_fac') }}" required autocomplete="register_fac" autofocus>
    @error('register_fac')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
    <span class="focus-input100"></span>
    <span class="symbol-input100">
        <i class="fa fa-user-secret" aria-hidden="true"></i>
    </span>
</div>

<div class="wrap-input100 validate-input" data-validate = "Your Location is required: ex@abc.xyz">

    <input id="location" type="text" placeholder="Pays - Localité" class="input100 @error('adress') is-invalid @enderror" name="adresse" value="{{ old('adresse') }}" required autocomplete="adresse" autofocus>
    @error('adresse')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
    <span class="focus-input100"></span>
    <span class="symbol-input100">
        <i class="fa fa-flag" aria-hidden="true"></i>
    </span>
</div>
<div class="wrap-input100 validate-input" data-validate = "Your University is required: ex@abc.xyz">

    <input id="univ" type="text" placeholder="Your University" class="input100 @error('university') is-invalid @enderror" name="university" value="{{ old('university') }}" required autocomplete="university" autofocus>
    @error('university')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
    <span class="focus-input100"></span>
    <span class="symbol-input100">
        <i class="fa fa-home" aria-hidden="true"></i>
    </span>
</div>
@endsection

@section('my_account')
{{route('admin.login')}}
@endsection
