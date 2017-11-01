<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Rate;
class RateController extends Controller
{
	protected $rate;

	public function __construct(
		Rate $rate
	)
	{
		$this->rate = $rate;
	}
    public function getList()
    {
    	$rates = $this->rate->all();
    	return view("admin.rate.rate",compact("rates"));
    }
}
