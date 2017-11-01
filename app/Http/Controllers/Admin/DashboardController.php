<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Receipt;
use App\Models\Order;
use App\Models\User;
use App\Models\Follow;
use App\Models\OrderDetail;
use App\Models\Rate;
use Charts,DB;
class DashboardController extends Controller
{
	protected $receipt;
	protected $order;
	protected $follow;
	protected $orderDetail;
	protected $rate;
	protected $user;
	public function __construct(
		Receipt $receipt,
		Order $order,
		Follow $follow,
		OrderDetail $orderDetail,
		Rate $rate,
		User $user
	)
	{
		$this->receipt = $receipt;
		$this->order = $order;
		$this->follow = $follow;
		$this->orderDetail = $orderDetail;
		$this->rate = $rate;
		$this->user = $user;
	}

    public function getList()
    {	
    	$chart1 = Charts::database($this->receipt->all(), 'bar', 'highcharts')
    					->title("Top đánh giá")
    					->elementLabel("rate_point")
					    ->dimensions(0, 500)
					    ->responsive(true)
					    ->groupBy('user_id');
	    $chart2 = Charts::database($this->follow->all(), 'pie', 'highcharts')
				->title("Theo dõi")
			    ->dimensions(1000, 500)
			    ->responsive(true)
			    ->groupBy('following_id');
	    $chart3 = Charts::multiDatabase('line', 'material')
	    		->title("")
			    ->dataset('Người dùng', User::all())
			    ->dataset('Công thức', Receipt::all())
			    ->dimensions(600, 500)
			    ->groupByDay();
		$countInvoice = $this->order->count();
		$countReceipt = $this->receipt->count();
		$countUser = $this->user->count();
		$countEvaluate = $this->rate->count();

		$newInvoice = $this->order->orderBy('id',"DESC")->first();
		$newReceipt = $this->receipt->orderBy('id',"DESC")->first();
		$newUser = $this->user->orderBy('id',"DESC")->first();
		$newEvaluate = $this->rate->orderBy('id',"DESC")->first();

        return view("admin.dashboard.dashboard",compact(
        	"chart1",
        	"chart2",
        	"chart3",
        	"countInvoice",
        	"countReceipt",
        	'countUser',
        	'countEvaluate',
        	'newInvoice',
        	'newReceipt',
        	'newUser',
        	'newEvaluate'
        ));
    }
}
