<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Foody;
use App\Repositories\Contracts\FoodyRepositoryInterface;

class FoodyController extends Controller
{
    private $foodyRepository;

    public function __construct(
        FoodyRepositoryInterface $foodyRepository
    )
    {
        $this->foodyRepository = $foodyRepository;
    }

    public function getList()
    {
        $parent_name = '';
        $foody = $this->foodyRepository->all();
        foreach ($foody as $value) {
            if ($value->parent_id != 0) {
                $parent = $this->foodyRepository->find($value->parent_id)->first();
                $parent_name = $parent->name;
            }
        }
        return view('admin.foody.foody_list', compact('foody', 'parent_name'));
    }

    public function postAdd(Request $request)
    {
        if (!$request->ajax()) {
            return false;
        }
        return response($this->foodyRepository->create($request->all()));
    }

    public function postEdit(Request $request)
    {
        if (!$request->ajax()) {
            return false;
        }
        $foody = $this->foodyRepository->updateFoody($request->all());
        return response($request->all());
    }

    public function getDelete($id)
    {
        $parent = $this->foodyRepository->countFoody($id);
        if ($parent == 0) {
            $foody = $this->foodyRepository->delete($id);
            return redirect()->route('getListFoody')
                ->with([
                    'flash_message' => trans('sites.deleteSuccess'),
                    'flash_level' => 'success'
                ]);
        } else {
            return redirect()->route('getListFoody')
                ->with([
                    'flash_message' => trans('sites.youCantDelete'),
                    'flash_level' => 'warning'
                ]);
        }
    }
}
