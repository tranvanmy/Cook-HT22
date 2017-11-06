<?php

namespace App\Http\Controllers\Users;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Contracts\FollowRepositoryInterface;
use App\Repositories\Contracts\ReceiptRepositoryInterface;

class MemberController extends Controller
{
    private $followRepository;
    private $receiptRepository;
    
    public function __construct(
        FollowRepositoryInterface $followRepository,
        ReceiptRepositoryInterface $receiptRepository
    )
    {
        $this->followRepository = $followRepository;
        $this->receiptRepository = $receiptRepository;
    }

    public function topLove()
    {
        $_top10 = $this->followRepository->topLove(10);
        return view("users.pages.topLove", compact("_top10"));
    }

    public function topChef()
    {
        $_top10Chef = $this->receiptRepository->topChef(10);
        return view("users.pages.topChef", compact("_top10Chef"));
    }
}
