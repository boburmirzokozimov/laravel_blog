<?php

namespace App\Modules\User\Traits;

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

    public function isAdmin(): bool
    {
        return $this->role = self::ROLE_ADMIN;
    }

    public function setRole(string $role): void
    {
        $this->role = $role;
    }

    public function isRoleEqual(string $role): bool
    {
        return $this->role == $role;
    }
}
