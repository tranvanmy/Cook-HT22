<?php

namespace App\Repositories\Eloquent;

use App\Models\Category;
use App\Repositories\Eloquent\Repository;
use App\Repositories\Contracts\CategoryRepositoryInterface;

class CategoryRepository extends Repository implements CategoryRepositoryInterface{

	public function model()
	{
		return Category::class;
	}
	
	public function updateCategory($data)
	{
        $category = $this->model->find($data['id']);
        $category->name = $data['name_cate'];
        $category->status = $data['sltStatus'];
		$category->save();
	}

	public function countCategory($id)
	{
		$category = $this->model->where('parent_id',$id)->count();
		
		return $category;
	}

}
