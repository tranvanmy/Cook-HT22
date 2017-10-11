<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Unit;

class UnitController extends Controller
{
    protected $unit;

    public function __construct(Unit $unit)
    {
        $this->unit = $unit;
    }

    public function getList()
    {
        $unit = Unit::select("*")->get();
        return view("admin.unit.unit", compact("unit"));
    }

    public function postAdd(Request $request)
    {
        if ($request->ajax()) {
            $response = $this->unit->create($request->all());
            return response($response);
        }
    }

    public function getDelete($id)
    {

        $unit = Unit::find($id);
        $unit->delete();

        return redirect()->route('getListUnit')
            ->with([
                'flash_message' => trans("sites.deleteSuccess"),
                'flash_level' => 'success'
            ]);

    }
}
