<?php

namespace App\Modules\User\Traits;

use App\Modules\User\Model\User;

trait HasRole
{
    public const ROLE_ADMIN = 'admin';
    public const ROLE_USER = 'user';
    public const ROLE_EDITOR = 'editor';

    public static function getRoles(): array
    {
        return [
            'Admin' => self::ROLE_ADMIN,
            'User' => self::ROLE_USER,
            'Editor' => self::ROLE_EDITOR,
        ];
    }

    public function isAdmin(User $user): bool
    {
        return $this->role = $user->role;
    }


}
