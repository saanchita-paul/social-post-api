<?php

namespace App\Services;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;


/**
 *
 */
class AddCommentService
{
    /**
     * @param Request $request
     * @param $postId
     * @return \Illuminate\Http\JsonResponse
     */
    public function addComment(Request $request, $postId)
    {
        try {
            $post = Post::findOrFail($postId);

            $comment = new Comment();
            $comment->user_id = $request->user_id;
            $comment->content = $request->comment;
            $post->comments()->save($comment);

            return response()->json([
                'message' => 'Comment added successfully.',
                'status' => true,
                'comment' => $comment,
            ]);
        } catch (\Throwable $th) {
            Log::error('ErrorFrom::AddCommentService::addComment()', [$th->getMessage(), $th->getTraceAsString()]);
            return $th;
        }
    }

}

