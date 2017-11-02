<?php
namespace App\Repositories\Contracts;

interface ReceiptIngredientRepositoryInterface extends RepositoryInterface
{
	public function getReceiptId($id);

	public function createReceiptIngredient($request, $id);

	public function updateReceiptIngredient($request);

}
