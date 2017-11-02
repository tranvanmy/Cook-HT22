<?php
namespace App\Repositories\Contracts;

interface ReceiptRepositoryInterface extends RepositoryInterface
{
    public function getUserId($id);

    public function getStatus($value);

    public function createReceipt($request);

    public function editReceipt($request);
}
