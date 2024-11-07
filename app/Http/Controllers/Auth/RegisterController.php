<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
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
    protected $redirectTo = '/main';

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
            'Fname' => ['required', 'string', 'max:255'],
            'Lname' => ['required', 'string', 'max:255'],
            'DoB' => ['required', 'date'],
            'gender' => ['required', 'in:Female,Male'],
            'personal_id' => ['required', 'string', 'unique:users,personal_id', 'max:10'],
            'email' => ['required', 'email', 'unique:users,email'],
            'user_mobile' => ['required', 'string', 'max:13'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'address' => ['required', 'string', 'max:255'],
            'HIC_id' => ['required', 'exists:h_i_c_s,id'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'Fname' => $data['Fname'],
            'Lname' => $data['Lname'],
            'DoB' => $data['DoB'],
            'gender' => $data['gender'],
            'personal_id' => $data['personal_id'],
            'email' => $data['email'],
            'user_mobile' => $data['user_mobile'],
            'password' => Hash::make($data['password']),
            'user_role' => $data['user_role'] ?? 'customer',
            'address' => $data['address'],
            'HIC_id' => $data['HIC_id'],
        ]);
    }
}
