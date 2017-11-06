<?php
namespace App\Repositories\Contracts;

interface UserRepositoryInterface extends RepositoryInterface
{
    public function editStatus($request);
 
    public function editProfile($request);
}
