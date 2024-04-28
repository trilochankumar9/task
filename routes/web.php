<?php

use App\Http\Controllers\PostController;
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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [PostController::class, 'loginPage'])->name('login');
Route::post('login-action', [PostController::class, 'loginAction'])->name('login-action');
Route::get('create-post', [PostController::class, 'createPost'])->name('create-post');
Route::post('post-create-action', [PostController::class, 'createPostAction'])->name('post-create-action');
Route::get('/posts', function () {
    $posts = \App\Models\Post::with('user')->get();
    return view('posts', compact('posts'));
});

