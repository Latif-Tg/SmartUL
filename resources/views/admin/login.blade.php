@extends('/layouts.login_layout')

@section('login_route')
    {{ route('admin.login') }}
@endsection

@section('register_route')
    {{ route('admin.register') }}
@endsection

@section('input-mat')
<div class="wrap-input100 validate-input" data-validate = "Your matricule is required: ex@abc.xyz">

    <input id="matricule" type="text" placeholder="Matricule de l'école" class="input100 @error('register_fac') is-invalid @enderror" name="register_fac" value="{{ old('register_fac') }}" required autocomplete="register_fac" autofocus>
    @error('register_fac')
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
 
@section('type')
administrateur d'établissement
@endsection


@section('connect-param')
<div class="form-group row">
    <div class="col-md-6 offset-md-4">
        <div class="form-check row mt-3 ml-5">
            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

            <label for="remember">
                {{ __('Se souvenir de moi') }}
            </label>
        </div>
    </div>
</div>

<div class="text-center p-t-12">
    
    @if (Route::has('password.request'))
        <a class="txt2" href="{{ route('password.request') }}">
            Mot de passe oublié?
        </a>
    @endif
</div>

<div class="text-center pt-5">
    @if (Route::has('register'))
    <a class="txt2" href="@yield('register_route')">
        Créer un nouveau compte
        <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
    </a>
    @endif
</div>
@endsection