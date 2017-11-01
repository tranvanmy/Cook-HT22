<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Contracts\CategoryRepositoryInterface;
use App\Models\Category;

class CateController extends Controller
{
    private $categoryRepository;

    public function __construct(
        CategoryRepositoryInterface $categoryRepository
    )
    {
        $this->categoryRepository = $categoryRepository;
    }
    public function getList()
    {      
        $cate = $this->categoryRepository->all();
        return view('admin.cate.cate_list', compact('cate'));
    }

    public function postAdd(Request $request)
    {
        if ($request->ajax()) {
            return response($this->categoryRepository->create($request->all()));
        }
    }

    public function postEdit(Request $request)
    {
        if ($request->ajax()) {
            $cate = $this->categoryRepository->updateCategory($request->all());
            return response($cate);
        }
    }

    public function getDelete($id)
    {
        $parent = $this->categoryRepository->countCategory($id);
        if ($parent == 0) {
            $cate = $this->categoryRepository->find($id);
            $cate->ingredients()->delete();
            $cate->delete();
            return redirect()->route('getListCate')
            ->with([
                'flash_message' => trans('sites.deleteSuccess'),
                'flash_level' => 'success'
            ]);
        } else {
            return redirect()->route('getListCate')
            ->with([
                'flash_message' => trans('sites.youCantDelete'),
                'flash_level' => 'warning'
            ]);
        }
    }

}
