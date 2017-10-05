<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Socialite;
use App\Models\User;
use Auth;
use App\Models\SocialAccount;

class SocialController extends Controller
{
    //
    public function redirectToProvider()
    {
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return Response
     */
    public function handleProviderCallback()
    {
        $user = Socialite::driver('facebook')->stateless()->user();
        $social = SocialAccount::SocialID($user->id)->SocialType('facebook')->first();
        if ($social) {
            $u = User::Email($user->email)->first();
            Auth::login($u);

            return redirect('/');
        } else {
            $temp = new SocialAccount();
            $temp->social_id = $user->id;
            $temp->social_type = "facebook";
            $u = User::Email($user->email)->first();
            if (!$u) {
                $u = User::create([
                    'name' => $user->name,
                    'password' => bcrypt("123456"),
                    "status" => "1",
                    'role' => 2,
                    'avatar' => $user->avatar,
                    'email' => $user->email
                ]);
            }
            $temp->user_id = $u->id;
            $temp->save();
            Auth::login($u);

            return redirect("/");
        }
    }
}
