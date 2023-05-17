<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FeedController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\VoteController;
use App\Http\Controllers\SaveController;
use App\Http\Controllers\FollowController;

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
    // Feed
    Route::get('/feed/all', [FeedController::class, 'index'])->name('all/posts');
    Route::get('/feed/student', [FeedController::class, 'getStudentsPosts'])->name('students/posts');
    Route::get('/feed/instructor', [FeedController::class, 'getInstructorsPosts'])->name('instructors/posts');
    Route::get('/feed/admin', [FeedController::class, 'getAdminsPosts'])->name('admin/posts');
    Route::get('/feed/following', [FeedController::class, 'getFollowingPosts'])->name('following/posts');

    // Profile
    Route::get('/profile', [UserController::class, 'profile']);
    Route::put('/profile/update', [UserController::class, 'profileUpdate']);
    Route::get('/profile/user/{user}', [UserController::class, 'viewProfile'])->name('view.profile');
    
    // Posts
    Route::get('/add/post', [PostController::class, 'index']);
    Route::post('/add/title/post', [PostController::class, 'createTitlePost']);
    Route::post('/add/image/post', [PostController::class, 'createImagePost']);
    Route::post('/add/link/post', [PostController::class, 'createLinkPost']);
    Route::get('/view/{post_id}/post', [PostController::class, 'viewPost'])->name('view/post');
    Route::delete('delete/{post}/post', [PostController::class, 'delete'])->name('post.delete');
    
    // Comments
    Route::post('/add/comment/{post_id}', [CommentController::class, 'storeComment']);
    Route::delete('/delete/comment/{comment}', [CommentController::class, 'delete'])->name('comment.delete');

    // Dashboard
    Route::get('/dashboard/posts', [DashboardController::class, 'posts'])->name('d/posts');
    Route::get('/dashboard/comments', [DashboardController::class, 'comments'])->name('d/comments');
    Route::get('/dashboard/saved', [DashboardController::class, 'saved'])->name('d/saved');
    Route::get('/dashboard/upvoted', [DashboardController::class, 'upvoted'])->name('d/upvoted');
    Route::get('/dashboard/downvoted', [DashboardController::class, 'downvoted'])->name('d/downvoted');

    // Users
    Route::get('change/password', [UserController::class, 'changePasswordView']);
    Route::post('change/password', [UserController::class, 'changePassword']);

    // Votes
    Route::post('post/vote', [VoteController::class, 'vote'])->name('posts.vote');

    // Save
    Route::post('/posts/save', [SaveController::class, 'save'])->name('posts.save');

    // Follow
    Route::post('/users/{id}/follow', [FollowController::class, 'follow'])->name('follow');
    Route::delete('/users/{id}/unfollow', [FollowController::class, 'unfollow'])->name('unfollow');

});
