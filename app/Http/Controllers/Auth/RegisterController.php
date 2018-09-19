<?php

namespace App\Http\Controllers\Auth;

use App\Company;
use App\Ngo;
use App\Student;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:student');
        $this->middleware('guest:ngo');
        $this->middleware('guest:company');
    }

    public function showStudentRegisterForm()
    {
        return view('auth.register', ['url' => 'student']);
    }

    public function showNgoRegisterForm()
    {
        return view('auth.register', ['url' => 'ngo']);
    }

    public function showCompanyRegisterForm()
    {
        return view('auth.register', ['url' => 'company']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */

    protected function createStudent(Request $request)
    {
        $this->validator($request->all())->validate();
        $student = Student::create([
            'Firstname' => $request['Firstname'],
            'Surname' => $request['Surname'],
            'Email' => $request['Email'],
            'Password' => Hash::make($request['Password']),
            'College' => $request['College'],
            'Phone' => $request['Phone'],
        ]);
        return redirect()->intended('login/student');
    }

    protected function createNgo(Request $request)
    {
        $this->validator($request->all())->validate();
        $ngo = Ngo::create([
            'Ngoname' => $request['Ngoname'],
            'Address' => $request['Address'],
            'Regno' => $request['Regno'],
            'Password' => Hash::make($request['Password']),
            'Email' => $request['Email'],
        ]);
        return redirect()->intended('login/ngo');
    }

    protected function createCompany(Request $request)
    {
        $this->validator($request->all())->validate();
        $company = Company::create([
            'Comname' => $request['Comname'],
            'Phone' => $request['Phone'],
            'Email' => $request['Email'],
            'Password' => Hash::make($request['Password']),
        ]);
        return redirect()->intended('login/company');
    }
    protected function validator(array $data)
    {
        return Validator::make($data, [
            // 'name' => 'required|string|max:255',
            'Email' => 'required|string|email|max:255|unique:company',
            'Password' => 'required|string|min:6|confirmed',
            'Phone' => 'string|min:10',
            'Comname' => 'string|min:6',
            'Ngoname' => 'string|min:6',
            'Address' => 'string|min:10',
            'Regno' => 'string|min:10',
            'Firstname' => 'string',
            'Surname' => 'string',
            'College' => 'string',

        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    // protected function create(array $data)
    // {
    //     return Company::create([
    //         // 'name' => $data['name'],
    //         'email' => $data['email'],
    //         'password' => Hash::make($data['password']),
    //     ]);
    // }
}
