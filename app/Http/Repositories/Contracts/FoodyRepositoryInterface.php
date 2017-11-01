<?php
namespace App\Repositories\Contracts;

interface FoodyRepositoryInterface extends RepositoryInterface
{
	public function updateFoody($data);

	public function countFoody($id);
}
