<?php

namespace App\Modules\Blog\UseCase\Destroy;

use App\Modules\Blog\Model\BlogRepository;
use App\Services\FileUploader;

class Handler
{
    public function __construct(private BlogRepository $repository,
                                private FileUploader   $uploader)
    {
    }

    public function handle(Command $command): void
    {
        $blog = $this->repository->getBlog($command->getId());

        if ($blog->image) {
            $this->uploader->remove($blog->image);
        }

        $this->repository->remove($blog->id);
    }
}
