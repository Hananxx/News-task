<?php

namespace Database\Factories;

use App\Models\Article;
use App\Models\Comment;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Comment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'sender_name' => $this->faker->name(),
            'content' => $this->faker->sentence(),
            'article_id' => Article::all()->random()->id,
            'isApproved' => $this->faker->boolean(40)
        ];
    }
}
