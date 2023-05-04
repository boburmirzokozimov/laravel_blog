<?php

namespace App\Modules\Blog\UseCase\Destroy;

class Command
{
    public function __construct(private int $id)
    {
    }

    public function getId(): int
    {
        return $this->id;
    }
}
