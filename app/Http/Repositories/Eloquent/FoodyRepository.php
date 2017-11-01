<?php
namespace App\Repositories\Eloquent;

use App\Models\Foody;
use App\Repositories\Eloquent\Repository;
use App\Repositories\Contracts\FoodyRepositoryInterface;

class FoodyRepository extends Repository implements FoodyRepositoryInterface{

	public function model()
	{
	    return Foody::class;
	}

	public function updateFoody($data)
	{
	    $foody = $this->model->find($data['id']);
	    $foody->name = $data['name_foody'];
	    $foody->parent_id = $data['sltStatus'];
	    $foody->status = $data['sltStatus'];
	    $foody->save();
	}

	public function countFoody($id)
	{
	    $foody = $this->model->where('parent_id', $id)->count();
	    return $foody;
	}
}
