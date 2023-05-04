<?php

namespace App\Modules\Blog\UseCase\Update;

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
        $blog = $this->repository->getBlog($command->blog_id);

        if ($command->image) {
            $this->uploader->remove($blog->image);
            $command->image = $this->uploader->upload($command->image, FileUploader::BLOG);
        } else {
            $command->image = $blog->image;
        }

        $blog->update($command->toArray());

        $blog->save();
    }
}
