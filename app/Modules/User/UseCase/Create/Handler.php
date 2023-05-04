<?php

namespace App\Modules\User\UseCase\Create;


use App\Modules\User\Model\User;
use App\Modules\User\Model\UserRepository;
use App\Modules\User\Services\PasswordHasher;

class Handler
{
    public function __construct(private UserRepository $userRepository,
                                private PasswordHasher $hasher)
    {
    }

    public function handle(Command $command): void
    {
        $user = User::create([
            'name' => $command->name,
            'surname' => $command->surname,
            'email' => $command->email,
            'password' => $this->hasher->hash($command->password)
        ]);

        $user->save();
    }
}
