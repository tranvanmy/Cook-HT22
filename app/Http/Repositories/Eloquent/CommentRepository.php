<?php
namespace App\Repositories\Eloquent;

use App\Models\Comment;
use App\Repositories\Eloquent\Repository;
use App\Repositories\Contracts\CommentRepositoryInterface;

class CommentRepository extends Repository implements CommentRepositoryInterface{

    public function model()
    {
        return Comment::class;
    }

    public function createComment($request)
    {
        return $this->model->create([
            'rate_id' => $request->idRate,
            'content' => $request->replyContent,
            'user_id' => $request->idUser
        ]);
    }
}
