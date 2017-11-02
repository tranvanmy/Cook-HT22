<?php
namespace App\Repositories\Contracts;

interface ReceiptStepRepositoryInterface extends RepositoryInterface
{
	public function getReceiptId($id);

	public function createReceiptStep($request);

	public function updateReceiptStep($request);
}
