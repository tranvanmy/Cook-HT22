<?php
namespace App\Repositories\Contracts;

interface ReceiptRepositoryInterface extends RepositoryInterface
{
    public function getUserId($id);

    public function getStatus($value);

    public function createReceipt($request);

    public function editReceipt($request);

    public function editStatus($request);

    public function getAllReceipt($with = [], $select = ['*'],$status = [], $paginate = 16);

    public function searchNormal($keyword);

    public function searchByAjax($keyword);

    public function slider();

    public function _6newReceipt();

    public function topChef($count);

    public function top5Receipt($value, $count);
}
