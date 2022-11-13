<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\Backend\CommunityController;
use App\Http\Controllers\Frontend\SubredditController;
use App\Http\Controllers\Backend\CommunityPostController;
use App\Http\Controllers\Frontend\CommunityController as FrontendCommunityController;
use App\Http\Controllers\Frontend\PostCommentController;
use App\Http\Controllers\Frontend\PostController;
use App\Http\Controllers\Frontend\WelcomeController;

Route::get('/', [WelcomeController::class, 'welcome'])->name('welcome');

Route::get('/r/{slug}', [FrontendCommunityController::class, 'show'])->name('community.show');
Route::get('/r/{community_slug}/posts/{post:slug}', [PostController::class, 'show'])->name('frontend.communities.post.show');
Route::post('/r/{community_slug}/posts/{post:slug}/comments', [PostCommentController::class, 'store'])->name('frontend.posts.comments');




Route::group(['middleware' => ['auth', 'verified']], function (){

    Route::resource('/communities', CommunityController::class);
    Route::resource('/communities.posts', CommunityPostController::class);
});
require __DIR__.'/auth.php';
