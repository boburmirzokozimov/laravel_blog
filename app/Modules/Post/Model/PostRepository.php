<?php

namespace App\Modules\Post\Model;

use App\Modules\User\Model\User;
use Illuminate\Support\Collection;

class PostRepository
{
    public function getPosts(): Collection
    {
        return Post::all();
    }

    public function getPostsOfUser(User $user): Collection
    {
        return Post::all()
            ->where('author_id', $user->id);
    }

    public function getPostsOfUserAndFriends(array $ids): Collection
    {
        return Post::all()->sortBy('created_at')
            ->whereIn('author_id', $ids);
    }

    public function getPost(string $post): Post
    {
        return Post::find($post);
    }

    public function remove(int $id): void
    {
        Post::destroy($id);
    }
}
