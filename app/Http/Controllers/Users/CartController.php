<?php

namespace App\Http\Controllers\Users;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Cart;
use App\Models\Receipt;
use App\Models\Order;
use App\Models\OrderDetail;
use Auth;
class CartController extends Controller
{
	protected $receipt;
    protected $order;
    protected $orderDetail;
    
	public function __construct(
		Receipt $receipt,
		Order $order,
		OrderDetail $orderDetail
	)
	{
		$this->receipt = $receipt;
		$this->order = $order;
		$this->orderDetail = $orderDetail;
	}
    public function buy($id)
    {
    	$receipt_buy = $this->receipt->getId($id)->first();
        Cart::add(array(
            'id' => $id,
            'name' => $receipt_buy->name,
            'qty' => 1,
            'price' => $receipt_buy->price,
            'user_id' => Auth::user()->id,
            'options' => array(
                'img' => $receipt_buy->image,
                'seller' => $receipt_buy->user->name,
                'description'=>$receipt_buy->description,

            )
        ));
        return redirect()->route("cartDetail");
    }
    public function show()
    {
    	$carts = Cart::content();
        $total = Cart::total();
        return view("users.pages.cart", compact("carts", "total"));
    }
    public function delete($id)
    {
        Cart::remove($id);
        return redirect()->route("cartDetail");
    }

    public function update(Request $request)
    {
        if ($request->ajax()) {
            $rowid = $request->rowId;
            $qty = $request->qty;
            Cart::update($rowid, $qty);
        }
    }
    public function checkOut(Request $request)
    {
    	if($request->ajax())
    	{
    		$order_id = $this->order->create([
    			'status' => 0,
    			'name'=>$request->name,
    			'user_id'=>$request->user_id,
    			'address'=>$request->address,
    			'phone'=>$request->phone,
    			'totalPrice'=>$request->totalPrice,
    			'note'=>$request->note
    		])->id;
    		$content = Cart::content();
    		foreach ($content as $value) {
    			$this->orderDetail->create([
    			'receipt_id' => $value->id,
    			'order_id' => $order_id,
    			'quantity' => $value->qty
    			]);
    		}
    		Cart::destroy();
    		return response(trans("sites.success"));
    	}
    }
}
