<?php
namespace App\Repositories\Contracts;

interface LikeRepositoryInterface extends RepositoryInterface
{
    public function getUser($user_id, $receipt_id);

    public function findLike($receipt_id, $user_id);
}
