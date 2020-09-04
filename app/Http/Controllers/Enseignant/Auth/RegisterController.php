<?php

namespace App\Http\Controllers\Enseignant\Auth;

use Alert;
use App\User;
use App\Enseignant;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
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
    protected $redirectTo = '/professionnal/home';

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
            'email' => ['required', 'string', 'email', 'max:255', 'unique:enseignants'],
            'university' => ['required', 'string'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'register_num' => ['required','string','min:3', 'max:100', 'unique:enseignants'],
            'phone' => ['required', 'string', 'min:4'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Enseignant
     */
    protected function create(array $data)
    {
        return Enseignant::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'university' => $data['university'],
            'phone' => $data['phone'],
            'password' => Hash::make($data['password']),
            'register_num' => $data['register_num'],
        ]);
    }
    /**
     * Show the application registration form.
     *
     * @return \Illuminate\View\View
     */
    public function showRegistrationForm()
    {
        alert()->warning('Veuillez renseigner le nom complet de l\'université et le matricule qui vous y ai attribué.');
        return view('enseignant.register');
    }
    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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
                    : redirect()->route('professionnal.login')->withInfo('Bienvenue sur SmartUL... Vous disposez d\'un compte professionnel.');

    }
}
