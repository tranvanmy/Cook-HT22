<?php

namespace App\Http\Controllers\Users;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Contracts\LikeRepositoryInterface;

class LikeController extends Controller
{
    private $likeRepository;

    public function __construct(
        LikeRepositoryInterface $likeRepository
    )
    {
        $this->likeRepository = $likeRepository;
    }

    public function like(Request $request)
    {
        if (!$request->ajax()) {
            return false;
        }
        $like = $this->likeRepository->findLike($request->receipt_id, $request->user_id);
        if (!isset($like->id)) {
            $response = $this->likeRepository->createLike($request);
            return $response;
        }
        $like->delete();
    }
}
