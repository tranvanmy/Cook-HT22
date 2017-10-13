<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;

class InvoiceController extends Controller
{
    public function __construct(
        Order $order,
        OrderDetail $orderDetail
    )
    {
        $this->order = $order;
        $this->orderDetail = $orderDetail;
    }

    public function getList()
    {
        $order = $this->order->selectItem("*")->orderByDESC('id')->get();
        return view("admin/invoice/invoice_list", compact("order"));
    }

    public function postEdit(Request $request)
    {
        if (!$request->ajax()) {
            return false;
        }
        $detailInvoce = $this->order->find($request->id)->receipts()->get();
        return $detailInvoce;
    }

    public function postUpdate(Request $request)
    {
        if (!$request->ajax()) {
            return false;
        }
        $order = $this->order->find($request->id);
        $order->status = $request->status;
        $order->save();
        return response($request->all());
    }
}
