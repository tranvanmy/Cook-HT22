<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Ingredient;
use App\Models\Category;
use App\Repositories\Contracts\IngredientRepositoryInterface;
use App\Repositories\Contracts\CategoryRepositoryInterface;

class IngredientController extends Controller
{
    private $categoryRepository;
    private $ingredientRepository;

    public function __construct(
        IngredientRepositoryInterface $ingredientRepository,
        CategoryRepositoryInterface $categoryRepository
    )
    {
        $this->ingredientRepository = $ingredientRepository;
        $this->categoryRepository = $categoryRepository;
    }

    public function getList()
    {
        $categories = $this->categoryRepository->all()->toArray();
        $ingredients = $this->ingredientRepository->all();
        return view('admin.ingredient.ingredient_list', compact('categories', 'ingredients'));
    }

    public function postAdd(Request $request)
    {
        if (!$request->ajax()) {
            return false;
        }

        return response($this->ingredientRepository->create($request->all()));
    }

    public function postEdit(Request $request)
    {
        if (!$request->ajax()) {
           return false;
        }
        $ingredient = $this->ingredientRepository->updateIngredient($request->all());

        return response($request->all());
    }

    public function getDelete($id)
    {
        $this->ingredientRepository->delete($id);
        return redirect()->route('getListIngredient')
            ->with([
                'flash_message' => trans('sites.deleteSuccess'),
                'flash_level' => 'success'
            ]);
    }
}
