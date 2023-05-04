<?php

namespace App\Modules\User\UseCase\Create;

use Spatie\LaravelData\Data;

class Command extends Data
{
    public string $name;
    public string $surname;
    public string $email;
    public string $password;
}
