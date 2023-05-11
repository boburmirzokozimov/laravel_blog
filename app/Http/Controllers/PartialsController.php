<?php

namespace App\Http\Controllers;

use App\Modules\User\Model\User;
use App\Modules\User\Model\UserRepository;

class PartialsController extends Controller
{
    public function __construct(private UserRepository $repository)
    {
    }

    public function users()
    {
        $users = $this->repository->getUsers();
        $roles = User::getRoles();

        return view('user.partials._users', [
            'users' => $users,
            'roles' => $roles
        ]);
    }
}
