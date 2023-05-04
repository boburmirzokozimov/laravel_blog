<?php

namespace App\Modules\Post\UseCase\Delete;

use App\Modules\Post\Model\PostRepository;
use App\Services\FileUploader;

class Handler
{
    public function __construct(private PostRepository $repository,
                                private FileUploader   $uploader)
    {
    }

    public function handle(Command $command): void
    {
        $post = $this->repository->getPost($command->post);

        if ($post->getCover()) {
            $this->uploader->remove($post->getCover());
        }

        $this->repository->remove($command->post);
    }
}
