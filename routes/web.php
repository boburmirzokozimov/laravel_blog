<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Blog\BlogController;
use App\Http\Controllers\Blog\Post\Comment\CommentController;
use App\Http\Controllers\Blog\Post\PostController;
use App\Http\Controllers\Role\RoleController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\User\UserFollowController;
use App\Http\Controllers\User\UserRoleController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::resource('/users', UserController::class);
    Route::post('/users/{user}/follow', UserFollowController::class)->name('user-follow.follow');
    Route::post('/users/{user}/role', UserRoleController::class)->name('user-role.role');

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::resource('/my_blog', BlogController::class);
    Route::resource('/my_blog/{blog}/posts', PostController::class);

    Route::post('/comment', [CommentController::class, 'store']);
    Route::put('/comment', [CommentController::class, 'update']);
    Route::delete('/comment', [CommentController::class, 'destroy']);
});

Auth::routes();

Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::get('/register', [AuthController::class, 'signin'])->name('register');
Route::get('/login', [AuthController::class, 'show']);
Route::post('/login', [AuthController::class, 'login'])->name('login');


