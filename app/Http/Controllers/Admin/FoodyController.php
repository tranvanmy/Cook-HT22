<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Foody;

class FoodyController extends Controller
{

    public function getList()
    {
        $parent_name = '';
        $foody = Foody::all();
        foreach ($foody as $value) {
            if ($value->parent_id != 0) {
                $parent = Foody::GetID($value->parent_id)->first();
                $parent_name = $parent->name;
            }
        }
        return view("admin.foody.foody_list", compact("foody", "parent_name"));
    }

    public function postAdd(Request $request)
    {
        if ($request->ajax()) {

            return response(Foody::create($request->all()));
        }
    }

    public function postEdit(Request $request)
    {
        if ($request->ajax()) {
            $foody = Foody::GetID($request->input("id"));
            if ($foody) {
                $foody->name = $request->input("name_foody");
                $foody->parent_id = $request->input("sltFoody");
                $foody->status = $request->input("sltStatus");
            }
            $foody->save();

            return response($foody);
        }
    }

    public function getDelete($id)
    {
        $parent = Foody::ParentID($id)->count();
        if ($parent == 0) {
            $cate = Foody::GetID($id);
            $cate->delete();

            return redirect()->route('getListFoody')
                ->with([
                    'flash_message' => trans("sites.deleteSuccess"),
                    'flash_level' => 'success'
                ]);
        } else {
            return redirect()->route('getListFoody')
                ->with([
                    'flash_message' => trans("sites.youCantDelete"),
                    'flash_level' => 'warning'
                ]);
        }
    }

}
