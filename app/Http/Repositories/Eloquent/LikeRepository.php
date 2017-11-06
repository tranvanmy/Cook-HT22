<?php
namespace App\Repositories\Eloquent;

use App\Models\Like;
use App\Repositories\Eloquent\Repository;
use App\Repositories\Contracts\LikeRepositoryInterface;

class LikeRepository extends Repository implements LikeRepositoryInterface
{
    public function model()
    {
        return Like::class;
    }

    public function getUser($user_id, $receipt_id)
    {
        return $this->model->where('user_id', $user_id)->where('receipt_id', $receipt_id);
    }

    public function findLike($receipt_id, $user_id)
    {
        return $this->model->where('receipt_id', $receipt_id)->where('user_id', $user_id)->first();
    }

    public function createLike($request)
    {
    	return $this->model->create([
            'receipt_id' => $request->receipt_id,
            'user_id' => $request->user_id,
            'status' => config('const.Active')
        ]);
    }
}
