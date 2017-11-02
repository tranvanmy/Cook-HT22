<?php
namespace App\Repositories\Eloquent;

use App\Models\ReceiptFoody;
use App\Repositories\Eloquent\Repository;
use App\Repositories\Contracts\ReceiptFoodyRepositoryInterface;

class ReceiptFoodyRepository extends Repository implements ReceiptFoodyRepositoryInterface{

	public function model()
	{
	    return ReceiptFoody::class;
	}

	public function getReceiptId($id)
	{
	    return $this->model->where('receipt_id', $id);
	}
}
