<?php

namespace App\Http\Controllers;

use App\Modules\Post\Model\PostRepository;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function __construct(private PostRepository $repository)
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $posts = $this->repository->getPostsOfUserAndFriends(Auth::user()->friends->pluck('id')->toArray());

        return view('user.home', [
            'posts' => $posts
        ]);
    }
}
