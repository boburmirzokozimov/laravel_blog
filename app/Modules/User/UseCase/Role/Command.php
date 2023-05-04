<?php

namespace App\Modules\User\UseCase\Role;

use Spatie\LaravelData\Data;

class Command extends Data
{
    public string $user;

    public string $role;
}
