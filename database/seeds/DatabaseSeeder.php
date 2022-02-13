<?php

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
        $this->call(LanguageSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(TagSeeder::class);
        $this->call(IngredientSeeder::class);
        $this->call(MealSeeder::class);
        $this->call(MealTagSeeder::class);
        $this->call(MealIngredientSeeder::class);
    }
}
