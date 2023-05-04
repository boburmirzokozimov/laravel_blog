<?php

namespace App\Http\Controllers\Blog\Post\Comment;

use App\Modules\Comment\Requests\CreateRequest;
use App\Modules\Comment\Requests\DeleteRequest;
use App\Modules\Comment\Requests\LikeRequest;
use App\Modules\Comment\UseCase;
use Throwable;

class CommentController
{
    public function store(CreateRequest $request, UseCase\Create\Handler $handler)
    {
        try {
            $command = UseCase\Create\Command::from($request->validated());
            $handler->handle($command);
        } catch (Throwable $e) {
            return back()->with('error', $e->getMessage());
        }
        return back()->with('success', 'Successfully created a new comment');
    }

    public function destroy(DeleteRequest $request, UseCase\Delete\Handler $handler)
    {
        try {
            $command = UseCase\Delete\Command::from($request->validated());
            $handler->handle($command);
        } catch (Throwable $e) {
            return back()->with('error', $e->getMessage());
        }
        return back()->with('success', 'Successfully removed the comment');
    }

    public function update(LikeRequest $request, UseCase\Like\Handler $handler)
    {
        try {
            $command = UseCase\Like\Command::from($request->validated());
            $handler->handle($command);
        } catch (Throwable $e) {
            return back()->with('error', $e->getMessage());
        }
        return back();
    }
}
