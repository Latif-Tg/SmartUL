<?php

namespace App\Http\Controllers\Admin\Auth;

use App\User;
use App\Faculty;
use Hashids\Hashids;
use Illuminate\Http\Request;
use Alert;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/faculty/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:faculties'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'adresse' => ['required','string', 'min:2'],
            'register_fac' => ['required','string','min:2','unique:faculties'],
            'university' => ['required','string', 'min:1'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return Faculty::create([
            'title' => $data['name'],
            'email' => $data['email'],
            'register_fac' => $data['register_fac'],
            'adresse' => $data['adresse'],
            'university' => $data['university'],
            'password' => Hash::make($data['password']),
            
        ]);
    }
    /**
     * Show the application registration form.
     *
     * @return \Illuminate\View\View
     */
    public function showRegistrationForm()
    {
        alert()->warning('Veuillez renseigner le nom complet de l\'université et celui de la faculté/école.');
        return view('admin.register');
    }

    public function register(Request $request)
    {
        $response = $this->validator($request->all());
        if($response->fails()) {
            return back()->withError($response->errors()->all()[0])->withInput();
        }

        event(new Registered($user = $this->create($request->all())));

        $this->guard()->login($user);

        if ($response = $this->registered($request, $user)) {
            return $response;
        }
        return $request->wantsJson()
                    ? new Response('', 201)
                    : redirect()->route('admin.login')->withInfo('Bienvenue sur SmartUL... Vous disposez d\'un compte pour publier les documents universitaires et autre');
    }
}
