<?php

namespace App\Modules\Post\UseCase\Create;

use Spatie\LaravelData\Data;

class Command extends Data
{
    public string $editordata;
    public $main_photo;

    public int $blog;

    public string $title;
}
