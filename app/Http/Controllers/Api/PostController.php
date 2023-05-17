<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Services\AddCommentService;
use App\Services\AddLikeService;
use App\Services\LikeCommentService;
use App\Services\PostCreateService;
use App\Services\PostDetailService;
use App\Services\GetCommentService;
use App\Services\PostListService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

/**
 *
 */
class PostController extends Controller
{
    /**
     * @param PostRequest $request
     * @return \Illuminate\Http\JsonResponse|string
     */
    public function createPost(PostRequest $request)
    {
        try {
            $createPost = new PostCreateService();
            $post = $createPost->addPost($request);
            if ($post) {
                return $post;
            } else {
                return 'Post not created';
            }
        }
        catch (\Throwable $th) {
//            return $th;
            Log::error('An error occurred: ',[$th->getMessage()]);
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }

    /**
     * @param Request $data
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator|\Illuminate\Http\JsonResponse
     */
    public function postList(Request $data)
    {
        try {
            $postList = new PostListService();
            return $postList->list($data);
        }
        catch (\Throwable $th) {
            Log::error('An error occurred: ',[$th->getMessage()]);
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function postDetails($id)
    {
        try {
            $postDetails = new PostDetailService();
            return $postDetails->singlePost($id);
        }
        catch (\Throwable $th) {
            Log::error('An error occurred: ',[$th->getMessage()]);
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }

    /**
     * @param Request $request
     * @param $postId
     * @return \Illuminate\Http\JsonResponse
     */
    public function getComments(Request $request, $postId)
    {
        try {
            $commentService = new GetCommentService();
            return $commentService->comments($request, $postId);
        } catch (\Throwable $th) {
            Log::error('An error occurred:', [$th->getMessage()]);
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }

    /**
     * @param Request $request
     * @param $postId
     * @return \Illuminate\Http\JsonResponse
     */
    public function addLike(Request $request, $postId)
    {
        try {
            $likeService = new AddLikeService();
            return $likeService->addLike($request, $postId);
        } catch (\Throwable $th) {
            Log::error('An error occurred:', [$th->getMessage()]);
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }


    /**
     * @param Request $request
     * @param $postId
     * @return \Illuminate\Http\JsonResponse
     */
    public function addComment(Request $request, $postId)
    {
        try {
            $commentService = new AddCommentService();
            return $commentService->addComment($request, $postId);
        } catch (\Throwable $th) {
            Log::error('An error occurred:', [$th->getMessage()]);
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }


    /**
     * @param Request $request
     * @param $commentId
     * @return \Illuminate\Http\JsonResponse
     */
    public function likeComment(Request $request, $commentId)
    {
        try {
            $likeService = new LikeCommentService();
            return $likeService->likeComment($request, $commentId);
        } catch (\Throwable $th) {
            Log::error('An error occurred:', [$th->getMessage()]);
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }
}
