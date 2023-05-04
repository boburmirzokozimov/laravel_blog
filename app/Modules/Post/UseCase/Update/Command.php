<?php

namespace App\Modules\Post\UseCase\Update;

use Spatie\LaravelData\Data;

class Command extends Data
{
    public string $editordata;
    public $main_photo;

    public string $title;
    public string $post;
    public string $blog;
}
