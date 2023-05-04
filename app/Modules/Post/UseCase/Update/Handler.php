<?php

namespace App\Modules\Post\UseCase\Update;

use App\Modules\Post\Model\PostRepository;
use App\Services\FileUploader;
use Illuminate\Support\Str;

class Handler
{
    public function __construct(private PostRepository $repository,
                                private FileUploader   $uploader)
    {
    }

    public function handle(Command $command): void
    {
        $post = $this->repository->getPost($command->post);

        if ($command->main_photo) {
            if ($post->content_photo) {
                $this->uploader->remove($post->content_photo);
            }
            $file = $this->uploader->upload($command->main_photo, FileUploader::POST);
        } else {
            $file = $post->content_photo;
        }

        $post->update([
            'title' => $command->title,
            'slug' => Str::slug($command->title),
            'content' => $command->editordata,
            'content_photo' => $file,
        ]);
    }
}
