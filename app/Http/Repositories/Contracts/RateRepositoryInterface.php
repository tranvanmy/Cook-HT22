<?php
namespace App\Repositories\Contracts;

interface RateRepositoryInterface extends RepositoryInterface
{
    public function getReceiptId($id);

    public function createRateByUser($request);
}
