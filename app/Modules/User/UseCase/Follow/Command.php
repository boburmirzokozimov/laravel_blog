<?php

namespace App\Modules\User\UseCase\Follow;

use Spatie\LaravelData\Data;

class Command extends Data
{
    public int $user_id;
    public int $following_user_id;
}
