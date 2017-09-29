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
            'name.required' => 'Không được để trống',
            'name.max' =>"Email tối đa 255 kí tự",
            'name.min' =>"Email tối thiểu 20 kí tự",
            'confirmPassword.same' => "Mật khẩu nhập lại không đúng",
            'password.min' => 'Mật khẩu trên 6 kí tự',
            'email.required' => 'Không được để trống email',
            'email.email' => "Không nhập đúng định dạng email",
            'password.required' => 'Không được để trống Mật khẩu',
            'confirmPassword.required' => "Không được để trống Xác nhấn mật khẩu"
        );
        return Validator::make($data, [
            'name' => 'required|string|max:255|min:10',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
            'confirmPassword' => 'required'
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
            'role' => (isset($data['role']) ? $data['role'] : 2),
            'status' => (isset($data['status']) ? $data['status'] : 1),
            'avatar' => '/image/user.png'
        ]);
    }
}
