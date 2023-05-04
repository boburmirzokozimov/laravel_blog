<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Modules\User\Requests\UserRoleRequest;
use App\Modules\User\UseCase;
use Throwable;

class UserRoleController extends Controller
{
    public function __invoke(UserRoleRequest $request, UseCase\Role\Handler $handler)
    {
        try {
            $command = UseCase\Role\Command::from($request->validated());
            $handler->handle($command);
        } catch (Throwable $e) {
            return back()->with('error', $e->getMessage());
        }
        return back()->with('success', 'Changed successfully');
    }
}
