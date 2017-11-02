<?php
namespace App\Repositories\Eloquent;

use App\Models\Unit;
use App\Repositories\Eloquent\Repository;
use App\Repositories\Contracts\UnitRepositoryInterface;

class UnitRepository extends Repository implements UnitRepositoryInterface
{
	public function model()
	{
		return Unit::class;
	}
}
