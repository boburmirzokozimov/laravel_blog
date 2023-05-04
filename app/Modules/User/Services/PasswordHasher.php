<?php

namespace App\Modules\User\Services;

class PasswordHasher
{
    public function hash(string $password): string
    {
        return bcrypt($password);
    }
}
