<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
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
    protected $redirectTo = '/home';

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
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        $message = array(
            'name.required' => trans("sites.required"),
            'name.max' => trans("sites.name"),
            'email.min' => trans("sites.email") . trans("sites.minEmail"),
            'confirmPassword.same' => trans("sites.incorrectConfirmPass"),
            'password.min' => trans("sites.minPass"),
            'password.max' => trans("sites.maxPass"),
            'email.required' => trans("sites.email") . trans("sites.required"),
            'email.email' => trans("sites.incorrectEmail"),
            'password.required' => trans("sites.password") . trans("sites.required"),
            'confirmPassword.required' => trans("sites.confirmPassword") . trans("sites.required")
        );
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users|min:10',
            'password' => 'required|string|min:6|max:50',
            'confirmPassword' => 'required|same:password'
        ], $message);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'remember_token' => $data['_token'],
            'role' => (isset($data['role']) ? $data['role'] : config('const.roleUser')),
            'avatar' => 'user.jpg',
            'status' => 1,
            'rank' => 1
        ]);
    }
}
