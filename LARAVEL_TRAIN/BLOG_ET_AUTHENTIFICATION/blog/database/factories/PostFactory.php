<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = Post::class;

    public function definition()
    {
        return [
            'titre' => $this->faker->sentence(rand(5,10),true),
            'contenu'=> $this->faker->sentence(10,true),
            'image'=>'http://via.placeholder.com/1000'
        ];
    }
}
