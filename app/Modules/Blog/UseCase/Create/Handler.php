<?php

namespace App\Modules\Blog\UseCase\Create;

use App\Modules\Blog\Model\Blog;
use App\Services\FileUploader;

class Handler
{
    public function __construct(private FileUploader $uploader)
    {
    }

    public function handle(Command $command): void
    {
        if ($command->image) {
            $image = $this->uploader->upload($command->image, FileUploader::BLOG);
        } else {
            $image = $command->image;
        }

        $blog = Blog::create([
            'name' => $command->name,
            'description' => $command->description,
            'image' => $image,
            'owner_id' => $command->owner_id
        ]);

        $blog->save();
    }
}
