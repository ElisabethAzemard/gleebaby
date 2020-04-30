<?php

namespace App\Http\Controllers\Auth;

use Auth;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('guest:caretaker')->except('logout');
        $this->middleware('guest:practitioner')->except('logout');
        $this->middleware('guest:sponsor')->except('logout');
    }


    /**
     * Manage regular User login
     */
    public function showLoginForm()
    {
        return view('auth.login', ['url' => 'admin']);
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if (auth()->attempt(['email' => $request->input('email'), 'password' => $request->input('password')]))
        {
            $user = auth()->user();
            return redirect()->intended('/admin');
        }else{
            return back()->with('error','your username and password are wrong.');
        }
    }


    /**
     * Manage Caretaker login
     */
    public function showCaretakerLoginForm()
    {
        return view('auth.login', ['url' => 'caretaker']);
    }

    public function caretakerLogin(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);

        if (Auth::guard('caretaker')->attempt(['email' => $request->input('email'), 'password' => $request->input('password')], $request->get('remember'))) {

            return redirect()->intended('/caretaker');
        }
        return back()->withInput($request->only('email', 'remember'));
    }


    /**
     * Manage practitioner login
     */
    public function showPractitionerLoginForm()
    {
        return view('auth.login', ['url' => 'practitioner']);
    }

    public function practitionerLogin(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);

        if (Auth::guard('practitioner')->attempt(['email' => $request->input('email'), 'password' => $request->input('password')], $request->get('remember'))) {

            return redirect()->intended('/practitioner');
        }
        return back()->withInput($request->only('email', 'remember'));
    }


    /**
     * Manage Sponsor login
     */
    public function showSponsorLoginForm()
    {
        return view('auth.login', ['url' => 'sponsor']);
    }

    public function sponsorLogin(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);

        if (Auth::guard('sponsor')->attempt(['email' => $request->input('email'), 'password' => $request->input('password')], $request->get('remember'))) {

            return redirect()->intended('/sponsor');
        }
        return back()->withInput($request->only('email', 'remember'));
    }

    public function logout(Request $request) {
        if ( Auth::guard('caretaker') ) {
            Auth::guard('caretaker')->logout();
            return redirect()->route('login.caretaker.show', ['url' => 'caretaker']);
        }

        if ( Auth::guard('practitioner') ) {
            Auth::guard('practitioner')->logout();
            return redirect()->route('login.practitioner.show', ['url' => 'practitioner']);
        }

        if ( Auth::guard('sponsor') ) {
            Auth::guard('sponsor')->logout();
            return redirect()->route('login.sponsor.show', ['url' => 'sponsor']);
        }

        return redirect('/login');
      }

}
