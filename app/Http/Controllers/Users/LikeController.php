<?php

namespace App\Http\Controllers\Users;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Like;

class LikeController extends Controller
{
    protected $like;
    public function __construct(
        Like $like
    )
    {
        $this->like = $like;
    }

    public function like(Request $request)
    {
        if (!$request->ajax()) {
            return false;
        }
        $like = $this->like->findLike($request->receipt_id, $request->user_id);
        if (!isset($like->id)) {
            $response = $this->like->create([
                'receipt_id' => $request->receipt_id,
                'user_id' => $request->user_id,
                'status' => 1
            ]);
            return $response;
        }
        $like->delete();
    }
}
