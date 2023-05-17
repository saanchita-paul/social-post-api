<?php

namespace App\Services;

use App\Models\Image;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

/**
 * Post Create Service
 */
class PostCreateService
{
    /**
     * Add new post with an image
     *
     * @param Request $data
     * @return \Illuminate\Http\JsonResponse
     */
    public function addPost(Request $data)
    {
        try {
            $post = new Post;
            $post->user_id = $data->user_id;
            $post->title = $data->title;
            $post->content = $data->body;
            $post->save();

            if ($data->hasFile('image_name')) {
                $file = $data->file('image_name');
                $file_name = time() . '_' . $file->getClientOriginalName();
                $file_path = $file->storeAs('uploads/post/images', $file_name, 'public');

                $image = new Image;
                $image->image_name = $file_name;
                $image->path = '/storage/' . $file_path;

                $post->images()->save($image);
            }

            return response()->json([
                'message' => 'Post Created',
                'status' => true,
                'post' => $post,
                'image' => $image
            ]);

        } catch (\Throwable $th) {
            return $th;
        }
    }
}

