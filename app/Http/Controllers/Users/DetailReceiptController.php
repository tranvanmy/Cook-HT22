<?php

namespace App\Http\Controllers\Users;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Contracts\ReceiptRepositoryInterface;
use App\Repositories\Contracts\ReceiptFoodyRepositoryInterface;
use App\Repositories\Contracts\ReceiptIngredientRepositoryInterface;
use App\Repositories\Contracts\ReceiptStepRepositoryInterface;
use App\Repositories\Contracts\FoodyRepositoryInterface;
use App\Repositories\Contracts\IngredientRepositoryInterface;
use App\Repositories\Contracts\UnitRepositoryInterface;
use App\Repositories\Contracts\RateRepositoryInterface;
use App\Repositories\Contracts\CommentRepositoryInterface;
use App\Repositories\Contracts\FollowRepositoryInterface;
use App\Repositories\Contracts\LikeRepositoryInterface;
use Auth, DB;

class DetailReceiptController extends Controller
{
    private $receiptRepository;
    private $followRepository;
    private $receiptIngredientRepository;
    private $foodyRepository;
    private $receiptFoodyRepository;
    private $receiptStepRepository;
    private $ingredientRepository;
    private $unitRepository;
    private $rateRepository;
    private $commentRepository;
    private $likeRepository;

    public function __construct(
        ReceiptRepositoryInterface $receiptRepository,
        FollowRepositoryInterface $followRepository,
        ReceiptIngredientRepositoryInterface $receiptIngredientRepository,
        FoodyRepositoryInterface $foodyRepository,
        ReceiptFoodyRepositoryInterface $receiptFoodyRepository,
        LikeRepositoryInterface $likeRepository,
        CommentRepositoryInterface $commentRepository,
        RateRepositoryInterface $rateRepository,
        UnitRepositoryInterface $unitRepository,
        FoodyRepositoryInterface $foodyRepository,
        ReceiptStepRepositoryInterface $receiptStepRepository

    )
    {
        $this->receiptIngredientRepository = $receiptIngredientRepository;
        $this->receiptRepository = $receiptRepository;
        $this->followRepository = $followRepository;
        $this->foodyRepository = $foodyRepository;
        $this->receiptStepRepository = $receiptStepRepository;
        $this->unitRepository = $unitRepository;
        $this->rateRepository = $rateRepository;
        $this->commentRepository = $commentRepository;
        $this->likeRepository = $likeRepository;
        $this->followRepository = $followRepository;
        $this->receiptFoodyRepository = $receiptFoodyRepository;

    }

    public function show($id)
    {
        $receipt = $this->receiptRepository->getId($id)->first();
        $recIngre = $this->receiptIngredientRepository->getReceiptId($id)->get();
        $countRecIngre = $recIngre->count();
        $recStep = $this->receiptStepRepository->getReceiptId($id)->get();
        $recFoody = $this->receiptFoodyRepository->getReceiptId($id)->first();
        $units = $this->unitRepository->all();
        $rates = $this->rateRepository->getReceiptId($id)->select("*")->orderBy('id', 'desc')->get();
        $following = $this->followRepository->getAllFollowing($receipt->user_id)->get()->count();
        $countReceipt = $this->receiptRepository->getUserId($receipt->user_id)->get()->count();
        if (Auth::check()) {
            $follower = $this->followRepository->getIdFollower(Auth::user()->id)->first();
            $likeByUser = $this->likeRepository->getUser(Auth::user()->id, $id)->first();
        }
        $_top5Receipt = $this->receiptRepository->top5Receipt(0,5);
        $_top5Member = $this->followRepository->topLove(5);
        $countLike = $receipt->likes->count();
        return view('users.pages.detail', compact(
            'receipt',
            'recIngre',
            'recStep',
            'recFoody',
            'units',
            'rates',
            'follower',
            'following',
            'countReceipt',
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
        $rate = $this->rateRepository->createRateByUser($request);


        $receipt = $this->receiptRepository->find($request->receipt_id);
        $rates = $this->rateRepository->getReceiptId($receipt->id)->get();

        $s = 0;
        for ($i = 0; $i < count($rates); $i++) {
            $s += $rates[$i]->point;
        }
        $receipt->rate_point = (float)$s / count($rates);
        $receipt->save();

        return response($request->all());
    }

    public function comment(Request $request)
    {
        if (!$request->ajax()) {
            return false;
        }

        $response = $this->commentRepository->createComment($request);
        return response($response);
    }
}
