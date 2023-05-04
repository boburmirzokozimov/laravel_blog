<?php

namespace App\Modules\User\UseCase\Role;

use App\Modules\User\Model\UserRepository;

class Handler
{
    public function __construct(private readonly UserRepository $repository)
    {
    }

    public function handle(Command $command): void
    {
        $user = $this->repository->getUser($command->user);

        $user->setRole($command->role);

        $user->save();
    }
}
