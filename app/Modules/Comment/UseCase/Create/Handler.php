<?php

namespace App\Modules\Comment\UseCase\Create;

use App\Modules\Comment\Model\Comment;

class Handler
{
    public function handle(Command $command): void
    {
        $comment = new Comment();

        $comment->comment = $command->comment;
        $comment->author_id = $command->author_id;
        $comment->post_id = $command->post_id;

        $comment->save();
    }
}
