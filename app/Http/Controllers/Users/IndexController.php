<?php

namespace App\Http\Controllers\Users;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Receipt;
use App\Models\User;
use App\Models\Follow;
use App\Models\Foody;
use App\Models\Category;
use App\Models\Ingredient;
use DB;

class IndexController extends Controller
{
    protected $receipt;
    protected $user;
    protected $follow;
    protected $foody;
    protected $category;
    public function __construct(
        Receipt $receipt,
        User $user,
        Follow $follow,
        Foody $foody,
        Category $category
    )
    {
        $this->receipt = $receipt;
        $this->user = $user;
        $this->follow = $follow;
        $this->foody = $foody;
        $this->category = $category;
    }

    public function home()
    {
        $slider = $this->receipt->orderByRaw("RAND()")->getStatus(1)->take(8)->get();
        $_6newReceipt = $this->receipt->getStatus(1)->OrderByDESC('id')->take(6)->get();
        return view("users.pages.home", compact("_6newReceipt","slider","categories"));
    }

    public function headerSearch(Request $request)
    {
        if (!$request->ajax()) {
            return false;
        }
        $k = $request->keyword;
        $keyword = '%' . $k . '%';
        $value = $this->receipt->select("id","name", "image")
            ->where('name', 'LIKE', $keyword)
            ->orWhere('description', 'LIKE', $keyword)
            ->getStatus(1)
            ->take(8)->OrderByDESC('id')->get();

            return $value;
    }

}
