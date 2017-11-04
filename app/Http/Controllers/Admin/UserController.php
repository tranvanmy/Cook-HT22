<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Contracts\UserRepositoryInterface;

class UserController extends Controller
{
    private $userRepository;
    public function __construct(
        UserRepositoryInterface $userRepository
    )
    {
        $this->userRepository = $userRepository;
    }

    public function getList()
    {
        $users = $this->userRepository->all();
        return view('admin.user.user',compact('users'));
    }

    public function postEdit(Request $request){
        if(!$request->ajax()){
            return false;
        }
        $user = $this->userRepository->editStatus($request);
        return response($user);
    }
}
