<?php

namespace App\Http\Controllers\Users;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Receipt;
use App\Models\Foody;
use App\Models\Ingredient;
use App\Models\Category;
class ReceiptController extends Controller
{
    protected $receipt;
    protected $foody;
    protected $ingredient;
    protected $category;
    public function __construct(
        Receipt $receipt,
        Foody $foody,
        Ingredient $ingredient,
        Category $category
    )
    {
        $this->receipt = $receipt;
        $this->foody = $foody;
        $this->ingredient = $ingredient;
        $this->category = $category;
    }

    public function index()
    {
        $receiptAll = $this->receipt->getStatus(1)->paginate(16);
        $countReceiptAll = $receiptAll->count();
        return view("users.pages.receipt", compact("receiptAll", "countReceiptAll"));
    }

    public function topEvaluate()
    {
        $topEvaluate = $this->receipt->getBigger("rate_point", 0)->getStatus(1)->OrderByDESC('rate_point')->paginate(16);
        $countTopEvaluate = $topEvaluate->count();
        return view("users.pages.topEvaluate", compact("topEvaluate", "countTopEvaluate"));
    }

    public function search(Request $request)
    {
        $word = $request->input("keyword");
        $keyword = "%" . $word . "%";
        $value = $this->receipt
            ->where("name", "LIKE", $keyword)
            ->orWhere("description", "LIKE", $keyword)
            ->getStatus(1)
            ->paginate(16)->setPath("");
        $pagination = $value->appends(array(
            "keyword" => $request->input("keyword")
        ));
        $countValue = $value->count();
        return view("users.pages.search", compact("value", "pagination", "word", "countValue"));
    }

    public function foody($id)
    {
        $foody = $this->foody->find($id);
        return view("users.pages.recFoody",compact("foody"));
    }

    public function ingredient($id)
    {
        $category = $this->category->find($id);
        // $cateIngre = $category->ingredients->groupBy("category_id");
        // dd($cateIngre);
        return view("users.pages.recIngre",compact("category"));
    }
}
