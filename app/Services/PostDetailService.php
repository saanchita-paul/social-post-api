<?php

namespace App\Services;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;


/**
 *
 */
class PostDetailService
{
    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function singlePost($id)
    {
        try {
            $post = Post::where('id', $id)
                ->with('images', 'comments')
                ->firstOrFail();

            $likeCount = $post->likes()->count();
            $likedBy = $post->likes()->with('user')->get();

            return response()->json([
                'status' => true,
                'post' => $post,
                'like_count' => $likeCount,
                'liked_by' => $likedBy,
            ]);
        } catch (\Throwable $th) {
            Log::error('An error occurred: ',[$th->getMessage()]);
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }
}

