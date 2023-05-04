<?php

namespace App\Modules\Post\Policies;

use App\Modules\Post\Model\Post;
use App\Modules\User\Model\User;
use Illuminate\Auth\Access\Response;

class PostPolicy
{
    public function update(User $user, Post $post): Response
    {
        //TODO: apply policies
        return $user->id === $post->author_id
            ? Response::allow()
            : Response::deny('You do not own this post.')->withStatus(403);
    }

    public function delete(User $user, Post $post): Response
    {
        return $user->id === $post->author_id
            ? Response::allow()
            : Response::deny('You do not own this post.')->withStatus(403);
    }
}
