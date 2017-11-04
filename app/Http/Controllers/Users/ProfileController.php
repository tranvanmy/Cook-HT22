<?php

namespace App\Http\Controllers\Users;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Follow;
use App\Repositories\Contracts\UserRepositoryInterface;
use App\Repositories\Contracts\FollowRepositoryInterface;

use Auth;

class ProfileController extends Controller
{
    private $userRepository;
    private $followRepository;

    public function __construct(
        UserRepositoryInterface $userRepository,
        FollowRepositoryInterface $followRepository
    )
    {
        $this->userRepository = $userRepository;
        $this->followRepository = $followRepository;
    }

    public function index($id)
    {
        $user = $this->userRepository->find($id);
        if (Auth::check()) {
            $follower = $this->followRepository->findFollow($user->id, Auth::user()->id);
        }
        return view("users.pages.profile", compact("user", "follower"));
    }

    public function updateProfile(Request $request)
    {
        if (!$request->ajax()) {
            return false;
        }
        if (isset($request->id)) {
            $user = $this->userRepository->editProfile($request);
        }
        return response($user);
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
