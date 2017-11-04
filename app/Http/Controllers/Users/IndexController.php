<?php

namespace App\Http\Controllers\Users;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Contracts\ReceiptRepositoryInterface;

class IndexController extends Controller
{
    private $receiptRepository;

    public function __construct(
        ReceiptRepositoryInterface $receiptRepository
    )
    {
        $this->receiptRepository = $receiptRepository;
    }

    public function home()
    {
        $slider = $this->receiptRepository->slider();
        $_6newReceipt = $this->receiptRepository->_6newReceipt();
        return view("users.pages.home", compact("_6newReceipt","slider"));
    }

    public function headerSearch(Request $request)
    {
        if (!$request->ajax()) {
            return false;
        }
        $k = $request->keyword;
        $keyword = '%' . $k . '%';
        $value = $this->receiptRepository->searchByAjax($keyword);
        return $value;
    }
}
