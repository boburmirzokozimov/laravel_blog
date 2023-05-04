<?php

namespace App\Modules\User\UseCase\Follow;

use App\Modules\User\Model\UserRepository;
use SebastianBergmann\Diff\InvalidArgumentException;

class Handler
{
    public function __construct(private UserRepository $repository)
    {
    }

    public function handle(Command $command): void
    {
        $user = $this->repository->getUser($command->user_id);
        $following_user = $this->repository->getUser($command->following_user_id);

        if ($user->isEqual($following_user)) {
            throw new InvalidArgumentException('You cannot follow yourself');
        }

        $user->toggleFollow($following_user);

        $user->save();
    }
}
