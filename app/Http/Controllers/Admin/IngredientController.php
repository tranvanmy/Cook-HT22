<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Ingredient;
use App\Models\Category;

class IngredientController extends Controller
{
    public function getList()
    {
        $categories = Category::all()->toArray();
        $ingredients = Ingredient::all();
        return view("admin.ingredient.ingredient_list", compact("categories", "ingredients"));
    }

    public function postAdd(Request $request)
    {
        if ($request->ajax()) {
            return response(Ingredient::create($request->all()));
        }
    }

    public function postEdit(Request $request)
    {
        if ($request->ajax()) {
            $ingredient = Ingredient::GetID($request->input("id"));
            if ($ingredient) {
                $ingredient->name = $request->input("name");
                $ingredient->category_id = $request->input("category_id");
                $ingredient->status = $request->input("status");
                $ingredient->description = $request->input("description");
                $ingredient->image = $request->input("image");
            }
            $ingredient->save();
            return response($ingredient);
        }
    }

    public function getDelete($id)
    {
        $ingredient = Ingredient::GetID($id);
        $ingredient->delete();
        return redirect()->route('getListIngredient')
            ->with([
                'flash_message' => trans("sites.deleteSuccess"),
                'flash_level' => 'success'
            ]);
    }
}
