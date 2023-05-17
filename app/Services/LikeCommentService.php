<?php

namespace App\Services;

use App\Models\Comment;
use App\Models\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;


/**
 *
 */
class LikeCommentService
{
    /**
     * @param Request $request
     * @param $commentId
     * @return \Illuminate\Http\JsonResponse
     */
    public function likeComment(Request $request, $commentId)
    {
        try {
            $comment = Comment::findOrFail($commentId);

            $like = new Like();
            $like->user_id = $request->user_id;
            $comment->likes()->save($like);

            return response()->json([
                'status' => true,
                'message' => 'Comment liked successfully.',
                'like' => $like,
            ]);
        } catch (\Throwable $th) {
            Log::error('An error occurred:', [$th->getMessage()]);
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }

}

