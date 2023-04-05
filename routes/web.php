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
    // Student Authentication
    Route::get('/', [LoginController::class, 'studentLogin']);
    Route::get('student/login', [LoginController::class, 'studentLogin'])->name('student.login');
    Route::post('student/login', [LoginController::class, 'authenticateStudent']);
    Route::get('student/register', [RegisterController::class, 'studentRegister']);

    // Instructor Authentication
    Route::get('instructor/login', [LoginController::class, 'instructorLogin']);
    Route::get('instructor/register', [RegisterController::class, 'instructorRegister']);
    
    // Admin Authentication
    Route::get('admin/login', [LoginController::class, 'adminLogin']);
});

// Logout for all users role
Route::get('logout', [UserController::class, 'logout']);

Route::middleware(['auth'])->group(function() {
    Route::get('/feed/{post}/posts', [FeedController::class, 'index'])->middleware('auth');
    Route::get('/profile', [UserController::class, 'profile']);
    Route::post('/profile/update', [UserController::class, 'profileUpdate']);
    
    Route::get('/add/post', [PostController::class, 'index']);
    Route::post('/add/post', [PostController::class, 'createPost']);
    Route::get('/view/post/{id}', [PostController::class, 'viewPost']);
    Route::post('/add/comment', [CommentController::class, 'createComment']);
});

require __DIR__.'/auth.php';
