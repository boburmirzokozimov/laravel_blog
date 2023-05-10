<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Modules\User\Model\User;
use App\Modules\User\Model\UserRepository;
use App\Modules\User\Requests\UserCreateRequest;
use App\Modules\User\Requests\UserUpdateRequest;
use App\Modules\User\UseCase;
use Throwable;

class UserController extends Controller
{
    public function __construct(private UserRepository $repository)
    {
    }

    public function index()
    {
        return view('user.index', [
            'cachedUsers' => $this->repository->getUsers()
        ]);
    }

    public function edit(User $user)
    {
        return view('user.edit', [
            'user' => $user,
        ]);
    }


    public function store(UserCreateRequest $request, UseCase\Create\Handler $handler)
    {
        try {
            $command = UseCase\Create\Command::from($request->validated());
            $handler->handle($command);
        } catch (Throwable $e) {
            return redirect('/users')->with('error', $e->getMessage());
        }

        return redirect('users')->with('success', 'Successfully created');
    }

    public function show(User $user)
    {
        return view('user.dashboard', [
            'curr_user' => $user
        ]);
    }

    public function create()
    {
        return view('user.create');
    }

    public function update(UserUpdateRequest $request, UseCase\Update\Handler $handler)
    {
        try {
            $command = UseCase\Update\Command::from($request->validated());
            $handler->handle($command);
        } catch (Throwable $e) {
            return redirect('/users')->with('error', $e->getMessage());
        }

        return redirect('users')->with('success', 'Successfully updated');
    }

    public function destroy(int $id)
    {
        $this->repository->remove($id);

        return redirect('users')->with('success', 'Successfully removed');
    }
}
