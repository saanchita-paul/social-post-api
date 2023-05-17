<?php

namespace App\Services;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;


/**
 *
 */
class PostListService
{
    /**
     * @param Request $data
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator|\Illuminate\Http\JsonResponse
     */
    public function list(Request $data)
    {
        try {
            return Post::query()
                ->with('images')
                ->where('title', 'like', "%{$data->get('search')}%")
                ->orderBy('id', 'desc')
                ->paginate($data->get('per_page'));

        } catch (\Throwable $th) {
            Log::error('An error occurred: ',[$th->getMessage()]);
            return response()->json([
                'message' => 'Post List Retrieved',
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }
}

