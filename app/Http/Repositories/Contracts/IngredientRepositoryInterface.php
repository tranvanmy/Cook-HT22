<?php
namespace App\Repositories\Contracts;

interface IngredientRepositoryInterface extends RepositoryInterface
{
    public function createIngredient($request);
	
    public function updateIngredient($data);
}
