<?php

namespace Database\Factories;

//use App\Models\Post;
use App\Models\Category;
use Exception;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    // protected $model = Post::class;cle old variant

    /**
     * Define the model's default state.
     *
     * @return array
     * @throws Exception
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(4),
            'post_content' => $this->faker->text(100),
            'image' => $this->faker->imageUrl(),
            'likes' => random_int(1, 2000),
            'active' => 1,
            'category_id' => Category::get()->random()->id
        ];
    }
}
