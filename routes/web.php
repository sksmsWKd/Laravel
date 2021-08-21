<?php

use App\Http\Controllers\ChartController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\FeelingController;
use App\Models\Feeling;
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

// Route::get('hihi2', [PostsController::class, 'hihi2']);
Route::put('/posts/{id}/comments/store', [CommentController::class, 'commentSave'])->name('comment.store');

Route::put('/commentsupdate/{cid}', [CommentController::class, 'commentUpdate'])->name('comment.update');

Route::get('/checkdelete/{checkId}', [PostsController::class, 'checkdelete'])->name('checkdelete');
Route::get('/commentdelete/{cid}', [CommentController::class, 'commentdelete'])->name('commentdelete');

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


Route::get('/test4', [TestController::class, 'index']);
Route::get('/posts/mylists', [PostsController::class, 'mylists'])->name('post.mylists');


Route::get(
    '/posts/create',
    [PostsController::class, 'create']
)/*->middleware(['auth'])*/;
//->middleware(['auth']);
//middle 웨어 지정, 이 미들웨어를 거쳐서 오게끔


Route::post(
    '/posts/store',
    [PostsController::class, 'store']
)->name('posts.store')/*->middleware(['auth'])*/;
//->middleware(['auth']);

Route::get(
    '/posts/index',
    [PostsController::class, 'index']
)->name('posts.index');
//->name 하면 이름 지정

//7897898797


Route::get('/posts/search', [PostsController::class, 'search'])->name('post.search');




Route::get('checklist', [PostsController::class, 'checklist'])->name('checklist');
Route::get('checkstore', [PostsController::class, 'checkstore'])->name('checkstore');


Route::get('/posts/show/{id}', [PostsController::class, 'show'])->name('post.show');
//route 파라미터로 id받음

Route::get('/posts/{post}', [PostsController::class, 'edit'])->name('post.edit');
//몇번 글인지 번호를 줘야함


Route::put('/posts/{id}', [PostsController::class, 'update'])->name('post.update');
//db에서 update 연산 수행


Route::delete('/posts/{id}', [PostsController::class, 'destroy'])->name('post.delete');

Route::get('/chart/index', [ChartController::class, 'index']);




Route::post('/addlike/{id}', [FeelingController::class, 'addLike'])->name('addlike');
Route::post('/adddisilke/{id}', [FeelingController::class, 'addDislike'])->name('adddislike');
//comment 체크
