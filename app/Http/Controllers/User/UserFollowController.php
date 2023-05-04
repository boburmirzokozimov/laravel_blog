<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Modules\User\Requests\UserFollowRequest;
use App\Modules\User\UseCase;
use Throwable;

class UserFollowController extends Controller
{
    public function __invoke(UserFollowRequest $request, UseCase\Follow\Handler $handler)
    {
        try {
            $command = UseCase\Follow\Command::from($request->validated());
            $handler->handle($command);
        } catch (Throwable $e) {
            return back()->with('error', $e->getMessage());
        }
        return back()->with('success', 'Followed successfully');
    }
}
