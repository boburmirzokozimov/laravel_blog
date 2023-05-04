<?php

namespace App\Modules\User\UseCase\Update;

use Illuminate\Http\UploadedFile;
use Spatie\LaravelData\Data;

class Command extends Data
{
    public int $id;
    public ?string $name;
    public ?string $surname;
    public ?string $email;
    public ?string $password;
    public UploadedFile|string|null $avatar;
    public UploadedFile|string|null $banner;
}
