<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
            'identification_user' => ['required', 'min:5'],
            'first_name' => ['required', 'string', 'min:3'],
            'second_name' => ['string', 'min:3'],
            'first_lastname' => ['required', 'string', 'min:3'],
            'second_lastname' => ['required', 'string', 'min:3'],
            'birthdate' => ['required', 'string', 'min:3'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required', 'min:3'],
            'gender' => ['required'],
            'civil_status' => ['required'],
            'role' => ['required'],
            'password' => ['required', 'string', 'min:4', 'confirmed'],
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
        return User::create([
            'identification_user' => $data['identification_user'],
            'first_name' => $data['first_name'],
            'second_name' => $data['second_name'],
            'first_lastname' => $data['first_lastname'],
            'second_lastname' => $data['second_lastname'],
            'birthdate' => $data['birthdate'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'gender' => $data['gender'],
            'civil_status' => $data['civil_status'],
            'role' => $data['role'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
