<?php

namespace App\Modules\Post\UseCase\Create;

use App\Modules\Post\Model\Post;
use App\Modules\Post\Model\PostRepository;
use App\Services\FileUploader;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class Handler
{
    public function __construct(private PostRepository $repository,
                                private FileUploader   $uploader)
    {
    }

    public function handle(Command $command): void
    {
        if ($command->main_photo) {
            $file = $this->uploader->upload($command->main_photo, FileUploader::POST);
        } else {
            $file = $command->main_photo;
        }

        $post = Post::create([
            'title' => $command->title,
            'slug' => Str::slug($command->title),
            'content' => $command->editordata,
            'content_photo' => $file,
            'author_id' => Auth::user()->id,
            'blog_id' => $command->blog
        ]);
    }
}
