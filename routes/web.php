<?php
/* MVC - Model View Controller
    Controller : Handle requests
    Model : Handle data logic and intractions with database (Database)
    View: What should be shown to the user (HTML and CSS code / Blade files*/



use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BrainController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', [DashboardController::class,'index']) ->name('dashboard');

Route::post('/ideas', [BrainController::class,'store']) ->name('brain.create');

Route::delete('/ideas/{brain}', [BrainController::class,'destroy']) ->name('brain.destroy')->middleware('auth');

Route::get('/ideas/{brain}', [BrainController::class,'show']) ->name('brain.show');

Route::get('/ideas/{brain}/edit', [BrainController::class,'edit']) ->name('brain.edit')->middleware('auth');

Route::put('/ideas/{brain}', [BrainController::class,'update']) ->name('brain.update')->middleware('auth');

Route::post('/ideas/{brain}/comments', [CommentController::class,'store']) ->name('brain.comments.store')->middleware('auth');

Route::get('/register', [AuthController::class,'register']) ->name('register');

Route::post('/register', [AuthController::class,'store']);

Route::get('/login', [AuthController::class,'login']) ->name('login');

Route::post('/login', [AuthController::class,'authenticate']);

Route::post('/logout', [AuthController::class,'logout']) ->name('logout');

Route::get('/terms', function(){
    return view('terms');
});
