<?php

namespace App\Http\Controllers\Users;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Follow;
use App\Models\Receipt;
use DB;

class MemberController extends Controller
{
    protected $follow;
    protected $receipt;
    public function __construct(
        Follow $follow,
        Receipt $receipt
    )
    {
        $this->follow = $follow;
        $this->receipt = $receipt;
    }

    public function topLove()
    {
        $_top10 = $this->follow->select('following_id', DB::raw('COUNT(following_id) as count'))
            ->groupBy('following_id')
            ->OrderByDESC('count')
            ->take(10)
            ->get();
        return view("users.pages.topLove", compact("_top10"));
    }

    public function topChef()
    {
        $_top10Chef = $this->receipt->select('user_id', DB::raw('COUNT(id) as count'))
            ->groupBy('user_id')
            ->OrderByDESC('count')
            ->getStatus(1)
            ->take(8)
            ->get();
        return view("users.pages.topChef", compact("_top10Chef"));
    }
}
