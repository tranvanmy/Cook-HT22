<?php

namespace App\Http\Controllers\Users;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Contracts\FollowRepositoryInterface;

class FollowController extends Controller
{
    private $followRepository;
    public function __construct(
        FollowRepositoryInterface $followRepository
    )
    {
        $this->followRepository = $followRepository;
    }

    public function follow(Request $request)
    {
        if (!$request->ajax()) {
            return false;
        } 
        $follow = $this->followRepository->findFollow($request->id_following, $request->id_follower);
        if (!isset($follow->id)) {
            $response = $this->followRepository->createFollow($request);
            return response($response);
        }
        $follow->delete();
    }
}


