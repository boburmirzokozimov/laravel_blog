<?php

namespace App\Modules\Comment\UseCase\Create;

use Spatie\LaravelData\Data;

class Command extends Data
{
    public string $comment;
    public string $post_id;
    public string $author_id;
}
