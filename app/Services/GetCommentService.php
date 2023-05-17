<?php

namespace App\Services;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;


/**
 *
 */
class GetCommentService
{
    /**
     * @param Request $request
     * @param $postId
     * @return \Illuminate\Http\JsonResponse
     */
    public function comments(Request $request, $postId)
    {
        try {
            $post = Post::findOrFail($postId);

            $perPage = $request->get('per_page', 10);

            $comments = $post->comments()
                ->with('user')
                ->paginate($perPage);

            return response()->json([
                'status' => true,
                'post' => $post,
                'comments' => $comments,
            ]);
        } catch (\Throwable $th) {
            return $th;
        }
    }



}

