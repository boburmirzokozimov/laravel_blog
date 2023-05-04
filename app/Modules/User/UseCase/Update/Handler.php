<?php

namespace App\Modules\User\UseCase\Update;

use App\Modules\User\Model\UserRepository;
use App\Modules\User\Services\PasswordHasher;
use App\Services\FileUploader;
use DomainException;

class Handler
{
    public function __construct(private UserRepository $repository,
                                private PasswordHasher $hasher,
                                private FileUploader   $uploader)
    {
    }

    public function handle(Command $command): void
    {
        if (!$user = $this->repository->getUser($command->id)) {
            throw new DomainException('User does not exist');
        }

        if (!$command->password) {
            $command->password = $user->getAuthPassword();
        } else {
            $command->password = $this->hasher->hash($command->password);
        }

        if ($command->avatar) {
            $command->avatar = $this->uploader->upload($command->avatar, FileUploader::USER);
                $user->hasAvatar() ?? $this->uploader->remove($user->avatar);
        } else {
            $command->avatar = $user->avatar;
        }

        if ($command->banner) {
            $command->banner = $this->uploader->upload($command->banner, FileUploader::BANNER);
                $user->hasBanner() ?? $this->uploader->remove($user->banner);
        } else {
            $command->banner = $user->banner;
        }


        $user->update($command->toArray());

        $user->save();
    }
}
