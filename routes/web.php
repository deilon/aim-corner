<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FeedController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;

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
    Route::post('instructor/register', [RegisterController::class, 'storeInstructor']);
    Route::post('student/register', [RegisterController::class, 'storeStudent']);
});

// Logout for all users role
Route::get('logout', [UserController::class, 'logout']);

Route::middleware(['auth'])->group(function() {
    Route::get('/feed/{post}/posts', [FeedController::class, 'index'])->name('all/feed');
    Route::get('/profile', [UserController::class, 'profile']);
    Route::put('/profile/update', [UserController::class, 'profileUpdate']);
    
    Route::get('/add/post', [PostController::class, 'index']);
    Route::post('/add/title/post', [PostController::class, 'createTitlePost']);
    Route::post('/add/image/post', [PostController::class, 'createImagePost']);
    Route::post('/add/link/post', [PostController::class, 'createLinkPost']);
    Route::get('/view/{post_id}/post', [PostController::class, 'viewPost'])->name('view/post');
    Route::post('/add/comment/{post_id}', [CommentController::class, 'storeComment']);

    Route::get('/dashboard/posts', [DashboardController::class, 'posts']);
    Route::get('/dashboard/comments', [DashboardController::class, 'comments']);
    Route::get('/dashboard/saved', [DashboardController::class, 'saved']);
    Route::get('/dashboard/upvoted', [DashboardController::class, 'upvoted']);
    Route::get('/dashboard/downvoted', [DashboardController::class, 'downvoted']);

    Route::get('change/password', [UserController::class, 'changePasswordView']);
    Route::post('change/password', [UserController::class, 'changePassword']);
});
