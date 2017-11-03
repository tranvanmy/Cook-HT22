<?php
namespace App\Repositories\Eloquent;

use App\Models\Follow;
use App\Repositories\Eloquent\Repository;
use App\Repositories\Contracts\FollowRepositoryInterface;
use DB;

class FollowRepository extends Repository implements FollowRepositoryInterface
{
    public function model()
    {
        return Follow::class;
    }

    public function findFollow($id_following, $id_follower)
    {
    	return $this->model->where('following_id', $id_following)->where('follower_id', $id_follower)->first();
    }

    public function getIdFollower($id_follower)
    {
    	return $this->model->where('follower_id', $id_follower);
    }

    public function getAllFollowing($id_following)
    {
    	return $this->model->where('following_id', $id_following);
    }

    public function getBigger($prop, $value)
    {
        return $this->model->where($prop, '>=', $value);
    }

    public function orderByDESC($prop)
    {
        return $this->model->orderBy($prop, 'DESC');
    }

    public function createFollow($request)
    {
    	return $this->model->create([
            'follower_id' => $request->id_follower,
            'following_id' => $request->id_following,
            'status' => config('const.Active')
        ]);
    }

    public function topLove($count)
    {
        return $this->model->select('following_id', DB::raw('COUNT(following_id) as count'))
            ->groupBy('following_id')
            ->orderBy('count','DESC')
            ->take($count)
            ->get();
    }
}
