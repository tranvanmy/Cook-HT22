<?php

namespace App\Http\Controllers\Users;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Follow;
use Auth;

class ProfileController extends Controller
{
    protected $user;
    protected $follow;
    public function __construct(
        User $user,
        Follow $follow
    )
    {
        $this->user = $user;
        $this->follow = $follow;
    }

    public function index($id)
    {
        $user = $this->user->find($id);
        if (Auth::check()) {
            $follower = $this->follow->FindFollow($user->id, Auth::user()->id)->first();
        }
        return view("users.pages.profile", compact("user", "follower"));
    }

    public function updateProfile(Request $request)
    {
        if (!$request->ajax()) {
            return false;
        }
        if (isset($request->id)) {
            $user = $this->user->find($request->id);
            if ($request->file("avatar") == null) {
                $user->name = $request->name;
                $user->phone = $request->phone;
                $user->address = $request->address;
                $user->save();
                return $user;
            }
            $file_name = $request->file('avatar')->getClientOriginalName();
            $request->file('avatar')->move('upload/images/', $file_name);
            $user->name = $request->name;
            $user->phone = $request->phone;
            $user->address = $request->address;
            $user->avatar = $file_name;
            $user->save();
            return $user;
        }
        return response($user);
    }

    public function follow(Request $request)
    {
        if (!$request->ajax()) {
            return false;
        }
        $follow = $this->follow->FindFollow($request->id_following, $request->id_follower);
        if (!isset($follow->id)) {
            $response = $this->follow->create([
                'follower_id' => $request->id_follower,
                'following_id' => $request->id_following,
                'status' => "1"
            ]);
            return response($response);
        }
        $follow->delete();
    }
}
