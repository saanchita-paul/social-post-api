<?php

namespace App\Services;

use App\Models\Like;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;


/**
 *
 */
class AddLikeService
{
    /**
     * @param Request $request
     * @param $postId
     * @return \Illuminate\Http\JsonResponse
     */
    public function addLike(Request $request, $postId)
    {
        try {
            $post = Post::findOrFail($postId);

            $like = new Like();
            $like->user_id = $request->user_id;
            $post->likes()->save($like);

            return response()->json([
                'message' => 'Like added successfully.',
                'status' => true,
                'like' => $like,
            ]);
        } catch (\Throwable $th) {
            return $th;
        }
    }

}

