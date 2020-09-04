@extends('layouts.register_layout')

@section('who')
username
@endsection

@section('route_register')
{{ route('register') }}
@endsection

@section('type')
<span style="color: rgb(0,100,0)">étudiant</span>
@endsection

@section('mat')

<div class="wrap-input100 validate-input" data-validate = "Your matricule is required: ex@abc.xyz">

    <input id="matricule" type="text" placeholder="Matricule" class="input100 @error('num_carte') is-invalid @enderror" name="num_carte" value="{{ old('num_carte') }}" required autocomplete="num_carte" autofocus>
    @error('num_carte')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
    <span class="focus-input100"></span>
    <span class="symbol-input100">
        <i class="fa fa-user-secret" aria-hidden="true"></i>
    </span>
</div>
@endsection

@section('my_account')
{{route('login')}}
@endsection
