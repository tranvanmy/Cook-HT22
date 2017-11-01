<?php

namespace App\Http\Controllers\ViewComposers;
use Illuminate\View\View;
use App\Models\Foody;
use App\Models\Receipt;
use App\Models\Follow;
use App\Models\ReceiptFoody;
use App\Models\Category;
use DB;

class IndexComposer{

	protected $receipt;
	protected $foddy;
	protected $follow;
	protected $recFoody;
	protected $category;

	public function __construct(
	 	Receipt $receipt,
	 	Foody $foody,
	 	Follow $follow,
	 	ReceiptFoody $recFoody,
	 	Category $category
	)
	{
		$this->receipt = $receipt;
		$this->foody = $foody;
		$this->follow = $follow;
		$this->recFoody = $recFoody;
		$this->category = $category;
	}

	public function composer(View $view)
	{
		$recFoody = $this->recFoody->select('foody_id', DB::raw('COUNT(receipt_id) as count'))
            ->groupBy('foody_id')
            ->OrderByDESC('count')
            ->take(7)
            ->get();
        $_top8 = $this->receipt->getBigger("rate_point", 3)
            ->getStatus(1)
            ->OrderByDESC('rate_point')
            ->take(8)
            ->get();
        $_top7 = $this->follow->select('following_id', DB::raw('COUNT(follower_id) as count'))
            ->groupBy('following_id')
            ->OrderByDESC('count')
            ->take(7)
            ->get();
        $_top8Chef = $this->receipt->select('user_id', DB::raw('COUNT(id) as count'))
            ->groupBy('user_id')
            ->OrderByDESC('count')
            ->take(8)
            ->getStatus(1)
            ->get();
		$view->with("_topFoody",$recFoody);
		$view->with("_top8",$_top8);
		$view->with("_top7",$_top7);
		$view->with("_top8Chef",$_top8Chef);
		$view->with('foodies',Foody::parentID(0)->get());
		$view->with("categories",$this->category->all());
	}
}