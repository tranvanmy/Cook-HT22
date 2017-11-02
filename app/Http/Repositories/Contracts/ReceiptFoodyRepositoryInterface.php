<?php
namespace App\Repositories\Contracts;

interface ReceiptFoodyRepositoryInterface extends RepositoryInterface
{
	public function getReceiptId($id);
}
