<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use App\Models\Categorie;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $categorie = Categorie::factory(5)->create();
        
        User::factory(10)->create()->each(function($user) use ($categorie){
            Post::factory(rand(1,3))->create([
                'user_id'=>$user->id,
                'categorie_id'=>($categorie->random(1)->first())->id
            ]);
        });
    }
}
