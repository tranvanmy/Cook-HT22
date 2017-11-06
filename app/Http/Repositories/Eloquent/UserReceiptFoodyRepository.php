<?php

namespace App\Repositories\Eloquent;

use App\Models\UserReceiptFoody;
use App\Repositories\Eloquent\Repository;
use App\Repositories\Contracts\UserReceiptFoodyRepositoryInterface;

class UserReceiptFoodyRepository extends Repository implements UserReceiptFoodyRepositoryInterface
{

    public function model()
    {
        return UserReceiptFoody::class;
    }

    public function getReceiptForkId($id)
    {
        return $this->model->where('user_receipt_id', $id);
    }

    public function forkFoody($receipt_foodies, $user_receipt_id)
    {
        foreach($receipt_foodies as $receipt_foody)
        {
            $arrfoodies = [];
            $arrfoodies = array_add($arrfoodies, 'user_receipt_id', $user_receipt_id);
            $arrfoodies = array_add($arrfoodies, 'foody_id', $receipt_foody->foody_id);
            $this->model->create($arrfoodies);
        }
    }
}
