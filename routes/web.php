<?php
/* MVC - Model View Controller
    Controller : Handle requests
    Model : Handle data logic and intractions with database (Database)
    View: What should be shown to the user (HTML and CSS code / Blade files*/


// In web.php or api.php

use App\Http\Controllers\IdeaLikeController;
use App\Http\Controllers\FollowerController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\DashboardController as Admin;
use App\Http\Controllers\BrainController;
use App\Http\Controllers\FeedController;
use App\Http\Controllers\UserController;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('', [DashboardController::class, 'index'])->name('dashboard');

Route::group(['prefix' => 'ideas/','as' => 'brain.'], function () {

    Route::post('', [BrainController::class, 'store'])->name('create');

    Route::get('/{brain}', [BrainController::class, 'show'])->name('show');

    Route::group(['middleware' => ['auth']], function () {

    Route::delete('/{brain}', [BrainController::class, 'destroy'])->name('destroy');

    Route::get('/{brain}/edit', [BrainController::class, 'edit'])->name('edit');

    Route::put('/{brain}', [BrainController::class, 'update'])->name('update');

    Route::post('/{brain}/comments', [CommentController::class, 'store'])->name('comments.store');
    });
});

Route::get('/register', [AuthController::class, 'register'])->name('register');

Route::post('/register', [AuthController::class, 'store']);

Route::get('/login', [AuthController::class, 'login'])->name('login');

Route::post('/login', [AuthController::class, 'authenticate']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::resource('users',UserController::class)->only('edit','update')->middleware('auth');

Route::resource('users',UserController::class)->only('show');

Route::get('/profile', [UserController::class, 'profile'])->middleware('auth')->name('profile');

Route::post('users/{user}/follow',[FollowerController::class,'follow'])->middleware('auth')->name('users.follow');

Route::post('users/{user}/unfollow',[FollowerController::class,'unfollow'])->middleware('auth')->name('users.unfollow');

Route::post('brains/{brain}/like',[IdeaLikeController::class,'like'])->middleware('auth')->name('brains.like');

Route::post('brains/{brain}/unlike',[IdeaLikeController::class,'unlike'])->middleware('auth')->name('brains.unlike');

Route::get('/feed', FeedController::class)->middleware('auth')->name('feed');


Route::get('/terms', function () {
    return view('terms');
})->name('terms');

Route::get('/admin',[Admin::class,'index'])->name('admin.dashboard')->middleware(['auth','can:admin']);


Route::get('lang/{lang}', function($lang){
    app()->setLocale($lang);
    session()->put('locale', $lang);

    return redirect()->route('dashboard');
})->name('lang');
