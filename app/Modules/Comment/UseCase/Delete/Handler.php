<?php

namespace App\Modules\Comment\UseCase\Delete;

use App\Modules\Comment\Model\CommentRepository;

class Handler
{
    public function __construct(private readonly CommentRepository $repository)
    {
    }

    public function handle(Command $command): void
    {
        $this->repository->remove($command->id);
    }
}
