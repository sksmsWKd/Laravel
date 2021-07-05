<?php

use App\Http\Controllers\PostsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $auther = 'song';
    return view('welcome', [
        'auther' => $auther
    ]);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';

Route::get(
    '/posts/create',
    [PostsController::class, 'create']
);
//->middleware(['auth']);
//middle 웨어 지정, 이 미들웨어를 거쳐서 오게끔

Route::post('/posts/store', [PostsController::class, 'store']);
//->middleware(['auth']);

Route::get('/posts/index', [PostsController::class, 'index'])->name('posts.index');
//->name 하면 이름 지정

Route::get('/posts/show/{id}', [PostsController::class, 'show'])->name('post.show');
