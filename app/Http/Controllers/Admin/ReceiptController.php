<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Contracts\ReceiptRepositoryInterface;

class ReceiptController extends Controller
{
    private $receiptRepository;

    public function __construct(ReceiptRepositoryInterface $receiptRepository){
        $this->receiptRepository = $receiptRepository;
    }

    public function getList()
    {
        $receipt = $this->receiptRepository->getAllReceipt([], '*', [1,2,0], '');
        return view("admin.receipt.manageReceipt",compact("receipt"));
    }

    public function postEdit(Request $request)
    {
        if(!$request->ajax()){
            return false;
        }
        $this->receiptRepository->editStatus($request);
		
        return response($request->all());
    }
}
