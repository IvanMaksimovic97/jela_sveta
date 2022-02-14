<?php

use App\Meal;
use App\MealTag;
use App\Tag;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MealTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $meals = Meal::all();
        $tags = Tag::all()->pluck('id');

        DB::transaction(function () use ($meals, $tags) {
            foreach ($meals as $meal) {
                $numberOfIngredients = rand(0, 5);
                for ($i = 0; $i <= $numberOfIngredients; $i++) {
                    $mealTag = new MealTag();
                    $mealTag->meal_id = $meal->id;
                    $mealTag->tag_id = $tags->random();
                    $mealTag->save();
                }
            }
        });
    }
}
