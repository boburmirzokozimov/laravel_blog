<?php

namespace App\Modules\Post\UseCase\Delete;

use Spatie\LaravelData\Data;

class Command extends Data
{
    public string $blog;
    public string $post;
}
