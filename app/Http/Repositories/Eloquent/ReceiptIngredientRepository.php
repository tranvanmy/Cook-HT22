<?php
namespace App\Repositories\Eloquent;

use App\Models\ReceiptIngredient;
use App\Repositories\Eloquent\Repository;
use App\Repositories\Contracts\ReceiptIngredientRepositoryInterface;

class ReceiptIngredientRepository extends Repository implements ReceiptIngredientRepositoryInterface{

	public function model()
	{
	    return ReceiptIngredient::class;
	}
	
	public function getReceiptId($id)
	{
	    return $this->model->where('receipt_id', $id);
	}

	public function createReceiptIngredient($request, $id)
	{
	    $receiptIngredient = $this->model->create([
            'receipt_id' => $request->idReceipt,
            'ingredient_id' => $id,
            'quantity' => $request->qty,
            'note' => $request->note
        ]);
	    return $receiptIngredient;
	}

	public function updateReceiptIngredient($request)
	{
		$receiptIngredient = $this->model->find($request['idRecIngre']);
		$receiptIngredient->quantity = $request['qty'];
		$receiptIngredient->note = $request['note'];
		$receiptIngredient->save();

		return true;
	}
}
