<?php

namespace App\Http\Controllers\Users;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Receipt;
use App\Models\ReceiptFoody;
use App\Models\ReceiptIngredient;
use App\Models\ReceiptStep;
use App\Models\Foody;
use App\Models\Ingredient;
use App\Models\Unit;
use App\Models\Rate;
use App\Models\Comment;
use App\Models\Follow;
use App\Models\Like;
use Auth, DB;

class DetailReceiptController extends Controller
{
    protected $receipt;
    protected $recIngre;
    protected $recFoody;
    protected $recStep;
    protected $ingredient;
    protected $foody;
    protected $unit;
    protected $comment;
    protected $follow;
    protected $like;

    public function __construct(
        Foody $foody,
        ReceiptIngredient $recIngre,
        Receipt $receipt,
        ReceiptStep $recStep,
        Ingredient $ingredient,
        ReceiptFoody $recFoody,
        Unit $unit,
        Rate $rate,
        Comment $comment,
        Follow $follow,
        Like $like

    )
    {
        $this->foody = $foody;
        $this->recIngre = $recIngre;
        $this->receipt = $receipt;
        $this->recStep = $recStep;
        $this->ingrediet = $ingredient;
        $this->recFoody = $recFoody;
        $this->unit = $unit;
        $this->rate = $rate;
        $this->comment = $comment;
        $this->follow = $follow;
        $this->like = $like;
    }

    public function show($id)
    {
        $receipt = $this->receipt->getId($id)->first();
        $recIngre = $this->recIngre->receiptId($id)->get();
        $countRecIngre = $this->recIngre->receiptId($id)->count();
        $recStep = $this->recStep->receiptId($id)->get();
        $recFoody = $this->recFoody->receiptId($id)->first();
        $units = $this->unit->all();
        $rates = $this->rate->receiptId($id)->select("*")->orderBy('id', 'desc')->get();
        $following = $this->follow->getAllFollowing($receipt->user_id)->get()->count();
        $countReceipt = $this->receipt->userId($receipt->user_id)->get()->count();
        if (Auth::check()) {
            $follower = $this->follow->getIdFollower(Auth::user()->id)->first();
            $likeByUser = $this->like->getUser(Auth::user()->id, $id)->first();
        }
        $_top5Receipt = $this->receipt->getBigger("rate_point", 0)->OrderByDESC('rate_point')->take(5)->get();
        $_top5Member = $this->follow->select('following_id', DB::raw('COUNT(following_id) as count'))
            ->groupBy('following_id')
            ->OrderByDESC('count')
            ->take(5)
            ->get();
        $countLike = $receipt->likes->count();
        return view("users.pages.detail", compact(
            "receipt",
            "recIngre",
            "recStep",
            "recFoody",
            "units",
            "rates",
            "follower",
            'following',
            "countReceipt",
            'likeByUser',
            'countRecIngre',
            'countLike',
            '_top5Receipt',
            '_top5Member'
        ));
    }

    public function calRation(Request $request)
    {
        if (!$request->ajax()) {
            return false;
        }
        $data = $request->arrData;
        $number = $request->number;
        $newData = array();
        for ($i = 0; $i < count($data); $i++) {
            array_push($newData, $number * $data[$i]);
        }
        return $newData;
    }

    public function rating(Request $request)
    {
        if (!$request->ajax()) {
            return false;
        }
        $rate = $this->rate->findRateByUser($request->receipt_id, $request->user_id);
        if (!isset($rate->id)) {
            $this->rate->create([
                'point' => $request->point[0],
                'user_id' => $request->user_id,
                'receipt_id' => $request->receipt_id,
                'content' => $request->content
            ]);
        } else {
            $rate->point = $request->point[0];
            $rate->content = $request->content;
            $rate->save();
        }


        $receipt = $this->receipt->find($request->receipt_id);
        $rates = $this->rate->receiptId($receipt->id)->get();

        $s = 0;
        for ($i = 0; $i < count($rates); $i++) {
            $s += $rates[$i]->point;
        }
        $receipt->rate_point = (float)$s / count($rates);
        $receipt->save();

        // return response($response);
        return response($request->all());
    }

    public function comment(Request $request)
    {
        if (!$request->ajax()) {
            return false;
        }

        $response = $this->comment->create([
            'rate_id' => $request->idRate,
            'content' => $request->replyContent,
            'user_id' => $request->idUser
        ]);
        return response($response);
    }
}
