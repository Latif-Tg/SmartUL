@extends('layouts.register_layout')
@section('who')
username
@endsection

@section('route_register')
{{ route('professionnal.register') }}
@endsection

@section('type')
<span style="color: rgb(0,100,0)">enseignant</span>
@endsection

@section('mat')
<div class="wrap-input100 validate-input" data-validate = "Your matricule is required: ex@abc.xyz">

    <input id="matricule" type="text" placeholder="Matricule" class="input100 @error('register_num') is-invalid @enderror" name="register_num" value="{{ old('register_num') }}" required autocomplete="register_num" autofocus>
    @error('register_num')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
    <span class="focus-input100"></span>
    <span class="symbol-input100">
        <i class="fa fa-user-secret" aria-hidden="true"></i>
    </span>
</div>
<!--University-->
<div class="wrap-input100 validate-input" data-validate = "Your university is required: ex@abc.xyz">

    <input id="univ" type="text" placeholder="University" class="input100 @error('university') is-invalid @enderror" name="university" value="{{ old('university') }}" required autocomplete="university" autofocus>
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
<!--Phone-->
<div class="wrap-input100 validate-input" data-validate = "Your phone is required: ex@abc.xyz">

    <input id="phone" type="text" placeholder="Ex: +228 91516886" class="input100 @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone" autofocus>
    @error('phone')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
    <span class="focus-input100"></span>
    <span class="symbol-input100">
        <i class="fa fa-phone" aria-hidden="true"></i>
    </span>
</div>
@endsection

@section('my_account')
{{route('professionnal.login')}}
@endsection
