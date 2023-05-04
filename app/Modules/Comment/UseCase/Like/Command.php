<?php

namespace App\Modules\Comment\UseCase\Like;

use Spatie\LaravelData\Data;

class Command extends Data
{
    public string $comment_id;
}
