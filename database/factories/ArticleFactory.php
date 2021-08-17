<?php

namespace Database\Factories;

use App\Models\Article;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

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
        $title = $this->faker->sentence(rand(8, 10));
        return [
            'title' => $title,
            'slug' => Str::slug($title),
            'excerpt' => $this->faker->paragraph(rand(1,2)),
            'content' => collect($this->faker->paragraphs(10))->map(function($p){
                return "<p>$p</p>";
            })->implode(''),
            'image' => $this->faker->imageUrl(),
            'user_id' => rand(1, 2),
        ];
    }
}
