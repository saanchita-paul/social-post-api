<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

/**
 * sanctum authentication middleware
 */
Route::group(['middleware' => ['auth:sanctum']], function () {
    /**
     * get user
     */
    Route::get('/user', [AuthController::class,'getUser']);
    /**
     * user logout
     */
    Route::post('/auth/logout',[AuthController::class,'logoutUser']);
});
/**
 * user register
 */
Route::post('/auth/register', [AuthController::class, 'createUser']);
/**
 * user login
 */
Route::post('/auth/login', [AuthController::class, 'loginUser']);



Route::post('/create-post', [PostController::class, 'createPost']);
Route::get('/post-list', [PostController::class, 'postList']);
Route::get('/posts/{postID}', [PostController::class, 'postDetails']);
Route::get('/posts/{postID}/comments', [PostController::class, 'getComments']);
Route::post('/posts/{postID}/like', [PostController::class, 'addLike']);
Route::post('/posts/{postID}/comment', [PostController::class, 'addComment']);
Route::post('/comments/{commentID}/like', [PostController::class, 'likeComment']);
