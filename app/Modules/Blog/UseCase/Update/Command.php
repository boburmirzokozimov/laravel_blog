<?php

namespace App\Modules\Blog\UseCase\Update;

use Spatie\LaravelData\Data;

class Command extends Data
{
    public string $name;
    public string $description;
    public $image;
    public ?int $blog_id;
}
