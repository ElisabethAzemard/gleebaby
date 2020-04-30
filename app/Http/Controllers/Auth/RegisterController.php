<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Caretaker;
use App\Practitioner;
use App\Sponsor;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;


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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
        // $this->middleware('guest:caretaker');
        // $this->middleware('guest:practitioner');
        // $this->middleware('guest:sponsor');
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
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Show Caretaker registration form
     */
    public function showRegistrationForm()
    {
        return view('auth.register', ['url' => 'admin']);
    }

    /**
     * Show Caretaker registration form
     */
    public function showCaretakerRegisterForm()
    {
        return view('auth.register', ['url' => 'caretaker']);
    }


    /**
     * Show Practitioner registration form
     */
    public function showPractitionerRegisterForm()
    {
        return view('auth.register', ['url' => 'practitioner']);
    }


    /**
     * Show Sponsor Registration form
     */
    public function showSponsorRegisterForm()
    {
        return view('auth.register', ['url' => 'sponsor']);
    }


    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function register(array $data)
    {
        return User::create([
            'first_name' => $request['first_name'],
            'last_name' => $request['last_name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    /**
     * Create a new Caretaker after valid registration
     * @param array $data
     * @return \App\Caretaker
     */
    protected function createCaretaker(Request $request)
    {
        $this->validator($request->all())->validate();
        $admin = Caretaker::create([
            'first_name' => $request['first_name'],
            'last_name' => $request['last_name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);
        return redirect()->intended('login/caretaker');
    }

    /**
     * Create a new Practitioner after valid registration
     * @param array $data
     * @return \App\Practitioner
     */
    protected function createPractitioner(Request $request)
    {
        $this->validator($request->all())->validate();
        $admin = Practitioner::create([
            'first_name' => $request['first_name'],
            'last_name' => $request['last_name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);
        return redirect()->intended('login/practitioner');
    }

    /**
     * Create a new Sponsor after valid registration
     * @param array $data
     * @return \App\Sponsor
     */
    protected function createSponsor(Request $request)
    {
        $this->validator($request->all())->validate();
        $admin = Sponsor::create([
            'first_name' => $request['first_name'],
            'last_name' => $request['last_name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);
        return redirect()->intended('login/sponsor');
    }
}



