<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Like;
use App\Models\Post;
use App\Models\Comment;
class LikeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $likeableType = $this->faker->randomElement([Post::class, Comment::class]);

        if ($likeableType === Post::class) {
            $likeable = Post::inRandomOrder()->first();
        } else {
            $likeable = Comment::inRandomOrder()->first();
        }

        return [
            'user_id' => $this->faker->numberBetween(1, 7),
            'likeable_type' => $likeableType,
            'likeable_id' => $likeable->id,
        ];

    }
}
