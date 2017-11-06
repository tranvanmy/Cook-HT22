<?php
namespace App\Repositories\Eloquent;

use App\Models\User;
use App\Repositories\Eloquent\Repository;
use App\Repositories\Contracts\UserRepositoryInterface;

class UserRepository extends Repository implements UserRepositoryInterface
{
    public function model()
    {
        return User::class;
    }

    public function editStatus($request)
    {
        $receipt = $this->model->find($request['id']);
        $receipt->status = $request['status'];
        $receipt->save();
        return $user;
    }

    public function editProfile($request)
    {
        $user = $this->model->find($request->id);
        if ($request->file("avatar") != null) {
            $file_name = $request->file('avatar')->getClientOriginalName();
            $request->file('avatar')->move(config('custom.image.url'), $file_name);
            $user->avatar = $file_name;
        }
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->save();
        
        return $user;
    }
}
