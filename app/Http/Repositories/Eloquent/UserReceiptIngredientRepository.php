<?php

namespace App\Repositories\Eloquent;

use App\Models\UserReceiptIngredient;
use App\Repositories\Eloquent\Repository;
use App\Repositories\Contracts\UserReceiptIngredientRepositoryInterface;

class UserReceiptIngredientRepository extends Repository implements UserReceiptIngredientRepositoryInterface
{
    public function model()
    {
        return UserReceiptIngredient::class;
    }

    public function getReceiptForkId($id)
    {
        return $this->model->where('user_receipt_id', $id);
    }

    public function forkIngredient($receipt_ingredients, $user_receipt_id)
    {
        foreach($receipt_ingredients as $receipt_ingredient)
        {
            $arrIngredients = [];
            $arrIngredients = array_add($arrIngredients, 'user_receipt_id', $user_receipt_id);
            $arrIngredients = array_add($arrIngredients, 'note', $receipt_ingredient->note);
            $arrIngredients = array_add($arrIngredients, 'quantity', $receipt_ingredient->quantity);
            $arrIngredients = array_add($arrIngredients, 'ingredient_id', $receipt_ingredient->ingredient_id);
            $this->model->create($arrIngredients);
        }
    }

    public function createUserReceiptIngredient($request, $id)
    {
        $receiptIngredient = $this->model->create([
            'user_receipt_id' => $request->idReceipt,
            'ingredient_id' => $id,
            'quantity' => $request->qty,
            'note' => $request->note
        ]);
	    return $receiptIngredient;
	}

    public function updateUserReceiptIngredient($request)
    {
        $receiptIngredient = $this->model->find($request['idRecIngre']);
        $receiptIngredient->quantity = $request['qty'];
        $receiptIngredient->note = $request['note'];
        $receiptIngredient->save();

        return true;
    }
}
