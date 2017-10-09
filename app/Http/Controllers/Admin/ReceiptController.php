<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Receipt;
use App\Models\ReceiptFoody;
class ReceiptController extends Controller
{
	public function getList()
	{
		$receipt = Receipt::select("*")->orderBy("id","DESC")->get();
		return view("admin.receipt.manageReceipt",compact("receipt","recFoody"));
	}
	public function postEdit(Request $request)
	{
		if($request->ajax())
		{
			$id = $request->id;
			$status = $request->status;
			$newReceipt = Receipt::find($id);
			$newReceipt->status = $status;
			$newReceipt->save();
		}
		return response($request->all());
	}
}
