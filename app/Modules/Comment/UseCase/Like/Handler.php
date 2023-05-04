<?php

namespace App\Modules\Comment\UseCase\Like;

use App\Modules\Comment\Model\CommentRepository;

class Handler
{
    public function __construct(private CommentRepository $repository)
    {
    }

    public function handle(Command $command): void
    {
        $comment = $this->repository->getComment($command->comment_id);

        $comment->toggleLike(auth()->user());

        $comment->save();
    }
}
