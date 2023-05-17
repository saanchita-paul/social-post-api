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


/**
 * post create api with single image support
 */
Route::post('/create-post', [PostController::class, 'createPost']);
/**
 * post list with image, pagination, search and count
 */
Route::get('/post-list', [PostController::class, 'postList']);
/**
 * post details with image, comments, like count of each post and liked by
 */
Route::get('/posts/{postID}', [PostController::class, 'postDetails']);
/**
 * comments list with pagination of the post
 */
Route::get('/posts/{postID}/comments', [PostController::class, 'getComments']);
/**
 * add like to a post
 */
Route::post('/posts/{postID}/like', [PostController::class, 'addLike']);
/**
 * comment on a post
 */
Route::post('/posts/{postID}/comment', [PostController::class, 'addComment']);
/**
 * like a comment
 */
Route::post('/comments/{commentID}/like', [PostController::class, 'likeComment']);
