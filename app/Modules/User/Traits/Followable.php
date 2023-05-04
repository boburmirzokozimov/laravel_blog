<?php

namespace App\Modules\User\Traits;

use App\Modules\User\Model\User;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

trait Followable
{
    public function toggleFollow(User $following_user)
    {
        if ($this->isFollowing($following_user)) {
            return $this->unfollow($following_user);
        }

        return $this->follow($following_user);
    }

    public function isFollowing(User $following_user): bool
    {
        return $this->friends()->where('friend_id', $following_user->id)->exists();
    }

    public function friends(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'user_friends', 'user_id', 'friend_id')->withTimestamps();
    }

    public function unfollow(User $following_user): void
    {
        $this->friends()->detach($following_user);
    }

    public function follow(User $following_user): void
    {
        $this->friends()->save($following_user);
    }

    public function hasFriends(): bool
    {
        return $this->friends()->count() > 0;
    }
}
