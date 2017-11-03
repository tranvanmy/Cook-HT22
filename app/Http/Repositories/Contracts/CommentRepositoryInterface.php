<?php
namespace App\Repositories\Contracts;

interface CommentRepositoryInterface extends RepositoryInterface
{
    public function createComment($request);
}
