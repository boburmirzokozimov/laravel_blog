<?php

namespace App\Modules\Blog\Response;

use DateTime;
use Spatie\LaravelData\Data;

class BlogsViewResponse extends Data
{
    public string $name;
    public string $description;
    public int $id;
    public int $owner_id;
    public DateTime $created_at;
}
