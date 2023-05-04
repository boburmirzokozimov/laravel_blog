<?php

namespace App\Modules\User\Model;

use Illuminate\Support\Collection;

class UserRepository
{
    public function getUsers(): Collection
    {
        return User::all()->sortBy('name');
    }

    public function getUser(int $userId): User
    {
        return User::find($userId);
    }

    public function getUserByEmail(string $email): User
    {
        return User::where('email', $email)->first();
    }

    public function existsByEmail(string $email): bool
    {
        return User::where('email', $email)->count() > 0;
    }

    public function remove(int $id): void
    {
        User::destroy($id);
    }

}
