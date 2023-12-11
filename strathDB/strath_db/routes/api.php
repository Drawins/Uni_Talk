<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticationController;
use App\Http\Controllers\Feed\FeedController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('/feed/store', [FeedController::class, 'store'])->middleware('auth:sanctum');

//http://127.0.0.1:8000/api/feed/store

Route::post('/feed/like/{feed_id}', [FeedController::class, 'likePost'])->middleware('auth:sanctum');

//http://127.0.0.1:8000/api/feed/comment/1
Route::post('/feed/comment/{feed_id}', [FeedController::class, 'comment'])->middleware('auth:sanctum');


//http://127.0.0.1:8000/api/feed/comments/1
Route::get('/feed/comments/{feed_id}', [FeedController::class, 'getComments'])->middleware('auth:sanctum');

//http://127.0.0.1:8000/api/feeds

Route::get('/feeds', [FeedController::class, 'index'])->middleware('auth:sanctum');




//http://127.0.0.1:8000/api/register

Route::post('register',[AuthenticationController::class, 'register']);

//http://127.0.0.1:8000/api/login

Route::post('login',[AuthenticationController::class, 'login']);
