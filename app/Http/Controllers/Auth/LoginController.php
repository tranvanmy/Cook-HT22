<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Http\Requests\LoginRequest;
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
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => ['logout', 'getLogout']]);
    }

    public function showFormLogin()
    {
        if (!Auth::check())
            return view("auth.login");
        else {
            if (Auth::user()->role == config('const.roleAdmin')) {
                return redirect("admin/dashboard");
            } else if (Auth::user()->role == config('const.roleUser')) {
                return redirect("/");
            }
        }
    }

    public function login(LoginRequest $request)
    {
        $auth = [
            'email' => $request->email,
            'password' => $request->password
        ];
        if (Auth::attempt($auth)) {
            if (Auth::user()->role == config('const.roleAdmin'))
                return redirect("admin/dashboard");
            else if (Auth::user()->role == config('const.roleUser'))
                return redirect("/");
        } else {
            return redirect()->back()->withErrors([
                'flash_message' => trans("incorrectLogin")
            ]);;
        }
    }

    public function getLogout()
    {
        Auth::logout();
        return redirect("/");
    }
}
