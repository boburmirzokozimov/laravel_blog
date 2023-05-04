<?php

namespace App\Modules\Post\Model\PostLike;

use Illuminate\Support\Collection;

class PostLikesRepository
{
    public function getPostsLikes(): Collection
    {
        return PostLike::all();
    }

    public function getPostLike(string $like): PostLike
    {
        return PostLike::find($like);
    }

    public function getLikesOfPost(Post $post): Collection
    {
        return PostLike::all()
            ->where('post_id', $post->id);
    }

    public function remove(int $id): void
    {
        PostLike::destroy($id);
    }
}
