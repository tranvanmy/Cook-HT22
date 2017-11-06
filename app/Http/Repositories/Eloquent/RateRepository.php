<?php
namespace App\Repositories\Eloquent;

use App\Models\Rate;
use App\Repositories\Eloquent\Repository;
use App\Repositories\Contracts\RateRepositoryInterface;

class RateRepository extends Repository implements RateRepositoryInterface
{
    public function model()
    {
        return Rate::class;
    }

    public function getReceiptId($id)
    {
        return $this->model->where('receipt_id', $id);
    }

    public function createRateByUser($request)
    {
        $rate = $this->model->where('receipt_id', $request->receipt_id)->where('user_id', $request->user_id)->first();
        if (!isset($rate->id)) {
            $this->model->create([
                'point' => $request->point[0],
                'user_id' => $request->user_id,
                'receipt_id' => $request->receipt_id,
                'content' => $request->content
            ]);
        } else {
            $rate->point = $request->point[0];
            $rate->content = $request->content;
            $rate->save();
        }
    }
}
