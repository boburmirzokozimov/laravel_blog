<?php

namespace App\Http\Controllers\Blog\Post;

use App\Modules\Blog\Model\Blog;
use App\Modules\Blog\Model\BlogRepository;
use App\Modules\Post\Model\Post;
use App\Modules\Post\Requests\CreateRequest;
use App\Modules\Post\Requests\DeleteRequest;
use App\Modules\Post\Requests\UpdateRequest;
use App\Modules\Post\UseCase;
use Throwable;

class PostController
{
    public function __construct(private BlogRepository $repository)
    {
    }

    public function create(Blog $blog)
    {
        return view('blog.post.create', [
            'blog' => $blog
        ]);
    }

    public function show(Blog $blog, Post $post)
    {
        return view('blog.post.show', [
            'post' => $post,
            'blog' => $blog,
            'comments' => $post->comments
        ]);
    }

    public function edit(Blog $blog, Post $post)
    {
        return view('blog.post.edit', [
            'post' => $post,
            'blog' => $blog
        ]);
    }

    public function store(CreateRequest $request, UseCase\Create\Handler $handler)
    {
        try {
            $command = UseCase\Create\Command::from($request->validated());
            $handler->handle($command);
        } catch (Throwable $e) {
            return redirect('/my_blog/')->with('error', $e->getMessage());
        }
        return redirect('/my_blog/' . $command->blog)->with('success', 'Successfully created a new post');
    }

    public function update(UpdateRequest $request, UseCase\Update\Handler $handler)
    {
        try {
            $command = UseCase\Update\Command::from($request->validated());
            $handler->handle($command);
        } catch (Throwable $e) {
            return redirect('/my_blog/')->with('error', $e->getMessage());
        }
        return redirect('/my_blog/' . $command->blog)->with('success', 'Successfully updated the post');
    }

    public function destroy(DeleteRequest $request, UseCase\Delete\Handler $handler)
    {
        try {
            $command = UseCase\Delete\Command::from($request->validated());
            $handler->handle($command);
        } catch (Throwable $e) {
            return back()->with('error', $e->getMessage());
        }
        return back()->with('success', 'Successfully removed the post');
    }
}
