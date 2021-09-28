<?php

use App\Http\Controllers\IndexController;
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

Route::get('/', [IndexController::class, 'index']);

Route::group(['middleware' => ['auth']], function () {
    Route::get('/posts', [PostsController::class, 'index']);
    Route::get('/posts/create', [PostsController::class, 'create']);
    Route::post('/posts', [PostsController::class, 'store']);
    Route::get('/posts/{id}/edit', [PostsController::class, 'edit']);
    Route::put('/posts/{id}', [PostsController::class, 'update']);
    Route::delete('/posts/{id}', [PostsController::class, 'destroy']);
});
Route::resource('categories', CategoryController::class)->middleware(['auth']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
