<?php

namespace App\Http\Controllers;

use App\Modules\User\Model\User;
use App\Modules\User\Model\UserRepository;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Cache;

class PartialsController extends Controller
{
    public function __construct(private UserRepository $repository)
    {
    }

    public function users()
    {
        $users = $this->repository->getUsers();
        $roles = User::getRoles();

        return Cache::remember('partials.users', Carbon::parse('10 minutes'), function () use ($users, $roles) {
            return view('user.partials._users', [
                'users' => $users,
                'roles' => $roles
            ])->render();
        });
    }
}
