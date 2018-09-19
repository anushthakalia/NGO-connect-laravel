<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;

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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:company')->except('logout');
        $this->middleware('guest:student')->except('logout');
        $this->middleware('guest:ngo')->except('logout');
    }

    public function showStudentLoginForm()
    {
        return view('auth.login', ['url' => 'student']);
    }

    public function studentLogin(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);

        if (Auth::guard('student')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {

            return redirect()->intended('/student');
        }
        return back()->withInput($request->only('email', 'remember'));
    }

    public function showNgoLoginForm()
    {
        return view('auth.login', ['url' => 'ngo']);
    }

    public function ngoLogin(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);

        if (Auth::guard('ngo')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {

            return redirect()->intended('/ngo');
        }
        return back()->withInput($request->only('email', 'remember'));
    }

    public function showCompanyLoginForm()
    {
        return view('auth.login', ['url' => 'company']);
    }

    public function companyLogin(Request $request)
    {   
        $this->validate($request, [
            'Email'   => 'required|string|email',
            'Password' => 'required|min:6'
        ]);
        // return $validator->errors()->all();
       

        if (Auth::guard('company')->attempt(['Email' => $request->Email, 'Password' => $request->Password], $request->remember)) {

            return redirect()->intended('/company');
        }
        return back()->withInput($request->only('Email', 'remember'));
    }
}
