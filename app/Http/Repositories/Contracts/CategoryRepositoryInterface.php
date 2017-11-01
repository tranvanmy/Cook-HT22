<?php
namespace App\Repositories\Contracts;

interface CategoryRepositoryInterface extends RepositoryInterface
{
	public function updateCategory($data);

	public function countCategory($id);
}
