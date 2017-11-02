<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Contracts\UnitRepositoryInterface;

class UnitController extends Controller
{
    private $unitRepository;

    public function __construct(UnitRepositoryInterface $unitRepository)
    {
        $this->unitRepository = $unitRepository;
    }

    public function getList()
    {
        $unit = $this->unitRepository->all();
        return view('admin.unit.unit', compact('unit'));
    }

    public function postAdd(Request $request)
    {
        if (!$request->ajax()) {
            return false;
        }
        $response = $this->unitRepository->create($request->all());
        return response($response);
    }

    public function getDelete($id)
    {

        $this->unitRepository->delete($id);

        return redirect()->route('getListUnit')
            ->with([
                'flash_message' => trans('sites.deleteSuccess'),
                'flash_level' => 'success'
            ]);

    }
}
