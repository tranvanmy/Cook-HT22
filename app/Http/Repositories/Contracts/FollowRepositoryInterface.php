<?php
namespace App\Repositories\Contracts;

interface FollowRepositoryInterface extends RepositoryInterface
{
    public function findFollow($id_following, $id_follower);

    public function getIdFollower($id_follower);

    public function getAllFollowing($id_following);

    public function getBigger($prop, $value);

    public function orderByDESC($prop);

    public function createFollow($request);

    public function topLove($count);
}
