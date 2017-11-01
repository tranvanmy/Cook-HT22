<?php

namespace App\Http\Controllers\Users;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Follow;

class FollowController extends Controller
{
    protected $follow;
    public function __construct(
        Follow $follow
    )
    {
        $this->follow = $follow;
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


