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

// Student Authentication
Route::get('student/login', [LoginController::class, 'studentLogin']);
Route::get('student/register', [RegisterController::class, 'studentRegister']);

// Instructor Authentication
Route::get('instructor/login', [LoginController::class, 'instructorLogin']);
Route::get('instructor/register', [RegisterController::class, 'instructorRegister']);

// Admin Authentication
Route::get('admin/login', [LoginController::class, 'adminLogin']);


Route::get('/feed/{post}/posts', [FeedController::class, 'index'])->middleware('auth');
Route::get('/profile', [UserController::class, 'profile'])->middleware('auth');
Route::post('/profile/update', [UserController::class, 'profileUpdate'])->middleware('auth');

Route::get('/add/post', [PostController::class, 'index'])->middleware('auth');
Route::post('/add/post', [PostController::class, 'createPost'])->middleware('auth');
Route::get('/view/post/{id}', [PostController::class, 'viewPost'])->middleware('auth');
Route::post('/add/comment', [CommentController::class, 'createComment'])->middleware('auth');

require __DIR__.'/auth.php';
