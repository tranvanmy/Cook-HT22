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
}
