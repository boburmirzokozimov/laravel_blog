<?php

namespace App\Modules\Comment\Traits;

use App\Modules\User\Model\User;

trait LikeAble
{
    public function toggleLike(User $user)
    {
        if (!$this->isLiked($user->id)) {
            return $this->like($user->id);
        }
        return $this->dislike($user->id);
    }

    public function isLiked(string $id): bool
    {
        return $this->likes()->where('user_id', $id)->exists();
    }

    public function like(string $id): void
    {
        $this->likes()->attach($id);
    }

    public function dislike(string $id): void
    {
        $this->likes()->detach($id);
    }
}
