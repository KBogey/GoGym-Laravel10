<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PostController;
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
$idRegex = '[0-9]+';
$slugRegex = '[0-9a-z\-]+';
//partie publique
Route::name('public.')->group( function () use ($idRegex, $slugRegex){
    Route::get('/', [App\Http\Controllers\Public\HomeController::class, 'home'])->name('home');
    Route::get('/contact', [App\Http\Controllers\Public\HomeController::class, 'contact'])->name('contact');
    Route::post('/contact/emails', [App\Http\Controllers\Public\HomeController::class, 'email'])->name('contact.emails');
    Route::get('/post/index', [\App\Http\Controllers\Public\PostController::class, 'index'])->name('posts.index');
    Route::get('/post/{slug}-{post}', [App\Http\Controllers\Public\PostController::class, 'show'])->name('post.show')->where([
        'slug' => $slugRegex,
        'post' => $idRegex
    ]);
});

//Login/out
Route::get('/login', [\App\Http\Controllers\AuthController::class, 'login'])
    ->middleware('guest')
    ->name('login');
Route::post('/login', [\App\Http\Controllers\AuthController::class, 'doLogin']);
Route::delete('/logout', [\App\Http\Controllers\AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');

//Partie admin
Route::prefix('/admin')->name('admin.')->middleware('auth')->group( function () use ($idRegex, $slugRegex) {
    Route::get('/', [AdminController::class, 'index']);
    Route::resource('post', PostController::class)->except('show');
    Route::resource('category', CategoryController::class)->except('show');
    Route::get('/post/{slug}-{post}', [\App\Http\Controllers\Admin\PostController::class, 'show'])->name('posts.show')->where([
        'post' => $idRegex,
        'slug' => $slugRegex
    ]);
});

