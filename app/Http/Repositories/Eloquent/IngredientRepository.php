<?php
namespace App\Repositories\Eloquent;

use App\Models\Ingredient;
use App\Repositories\Eloquent\Repository;
use App\Repositories\Contracts\IngredientRepositoryInterface;

class IngredientRepository extends Repository implements IngredientRepositoryInterface{

	public function model()
	{
	    return Ingredient::class;
	}

    public function updateIngredient($data)
    {
        $ingredient = $this->model->find($data['id']);
        $ingredient->name = $data['name'];
        $ingredient->category_id = $data['category_id'];
        $ingredient->status = $data['status'];
        $ingredient->description = $data['description'];
        $ingredient->image = $data['image'];
        $ingredient->save();
    }

    public function createIngredient($request)
    {
        $ingredient = $this->model->create([
            'name' => $request->name,
            'unit_id' => $request->unit,
            'status' => 0
        ]);
        return $ingredient;
    }

    public function updateIngreUser($request)
    {
        $ingredient = $this->model->find($request->idIngre);
        $ingredient->name = $request->name;
        $ingredient->unit_id = $request->unit;
        $ingredient->status = 0;
        $ingredient->save();
    }
}
