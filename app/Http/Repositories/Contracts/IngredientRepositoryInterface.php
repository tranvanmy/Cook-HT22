<?php
namespace App\Repositories\Contracts;

interface IngredientRepositoryInterface extends RepositoryInterface
{
	public function updateIngredient($data);
}
