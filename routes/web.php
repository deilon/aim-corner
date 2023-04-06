<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FeedController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\CommentController;

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


Route::middleware(['guest'])->group(function() {
    Route::get('/', [LoginController::class, 'login']);
    Route::get('login', [LoginController::class, 'login'])->name('login');
    Route::post('login', [LoginController::class, 'authenticateUsers']);
    
    // Registrations
    Route::get('student/register', [RegisterController::class, 'studentRegister']);
    Route::get('instructor/register', [RegisterController::class, 'instructorRegister']);
});

// Logout for all users role
Route::get('logout', [UserController::class, 'logout']);

Route::middleware(['auth'])->group(function() {
    Route::get('/feed/{post}/posts', [FeedController::class, 'index']);
    Route::get('/profile', [UserController::class, 'profile']);
    Route::post('/profile/update', [UserController::class, 'profileUpdate']);
    
    Route::get('/add/post', [PostController::class, 'index']);
    Route::post('/add/post', [PostController::class, 'createPost']);
    Route::get('/view/post/{id}', [PostController::class, 'viewPost']);
    Route::post('/add/comment', [CommentController::class, 'createComment']);
});
