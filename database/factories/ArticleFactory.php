<?php

namespace Database\Factories;

use App\Models\Article;
use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ArticleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Article::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(5),
            'author_name' => $this->faker->name(),
            'cover_img' => $this->faker->randomElement(['https://i.ibb.co/PQcZ3sm/Screen-Shot-1442-12-12-at-2-34-01-PM.png','https://i.ibb.co/m6GKMVh/Screen-Shot-1442-12-17-at-10-29-38-AM.png', 'https://i.ibb.co/ZTKzg3x/Screen-Shot-1442-12-17-at-10-36-37-AM.png']),
            'category_id' => Category::all()->random()->id,
            'user_id' => User::all()->random()->id,
            'content' => $this->faker->paragraph(20),
            'created_at' => $this->faker->dateTimeBetween($startDate = '-5 days', $endDate = 'now')
        ];
    }
}
