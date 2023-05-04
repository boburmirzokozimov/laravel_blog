<?php

namespace App\Modules\Comment\Model;

use App\Modules\Post\Model\Post;
use Illuminate\Support\Collection;

class CommentRepository
{
    public function getComments(): Collection
    {
        return Comment::all();
    }

    public function getComment(string $comment): Comment
    {
        return Comment::find($comment);
    }

    public function getCommentsOfPost(Post $post): Collection
    {
        return Comment::all()
            ->where('post_id', $post->id);
    }

    public function remove(int $id): void
    {
        Comment::destroy($id);
    }
}
