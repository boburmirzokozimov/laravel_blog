<?php

namespace App\Modules\Blog\UseCase\Create;

use Spatie\LaravelData\Data;

class Command extends Data
{
    public string $name;
    public string $description;

    public $image;

    public ?int $owner_id;
}
