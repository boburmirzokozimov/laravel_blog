<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Modules\Blog\Model\Blog;
use App\Modules\Blog\Model\BlogRepository;
use App\Modules\Blog\Requests\BlogCreateRequest;
use App\Modules\Blog\Requests\BlogUpdateRequest;
use App\Modules\Blog\Requests\UserUpdateRequest;
use App\Modules\Blog\UseCase;
use Illuminate\Support\Facades\Auth;
use Throwable;

class BlogController extends Controller
{
    public function __construct(private BlogRepository $repository)
    {
    }

    public function index()
    {
        $blogs = $this->repository->getBlogsOfUser(Auth::user()->id);

        return view('blog.index', [
            'blogs' => $blogs,
        ]);
    }

    public function store(BlogCreateRequest $request, UseCase\Create\Handler $handler)
    {
        try {
            $command = UseCase\Create\Command::from($request->validated());
            $handler->handle($command);
        } catch (Throwable $e) {
            return redirect('/my_blog')->with('error', $e->getMessage());
        }

        return redirect('/my_blog')->with('success', 'Successfully created a new blog');
    }

    public function edit(Blog $my_blog)
    {
        return view('blog.edit', [
            'blog' => $my_blog
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $my_blog)
    {
        return view('blog.single', [
            'blog' => $my_blog,
            'posts' => $my_blog->posts()->latest()->get()
        ]);
    }

    public function create()
    {
        $user = Auth::user();
        return view('blog.create', [
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BlogUpdateRequest $request, UseCase\Update\Handler $handler)
    {
        try {
            $command = UseCase\Update\Command::from($request->validated());
            $handler->handle($command);
        } catch (Throwable $e) {
            return redirect('/my_blog')->with('error', $e->getMessage());
        }
        return redirect('/my_blog')->with('success', 'Successfully updated the blog');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id, UseCase\Destroy\Handler $handler)
    {
        $command = new UseCase\Destroy\Command($id);
        try {
            $handler->handle($command);
        } catch (Throwable $e) {
            return redirect('/my_blog')->with('error', $e->getMessage());
        }

        return redirect('/my_blog')->with('success', 'Successfully deleted the blog');
    }
}
