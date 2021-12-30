<?php

namespace Database\Factories;

use App\Models\Categorie;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategorieFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $guarded = [];
    
    protected $model = Categorie::class;

    public function definition()
    {
        return [
            'nom' => $this->faker->sentence(rand(1,3),true)     
        ];
    }
}
