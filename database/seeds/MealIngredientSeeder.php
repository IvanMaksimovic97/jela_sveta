<?php

use App\Ingredient;
use App\Meal;
use App\MealIngredient;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MealIngredientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $meals = Meal::all();
        $ingredients = Ingredient::all()->pluck('id');

        DB::transaction(function () use ($meals, $ingredients) {
            foreach ($meals as $meal) {
                $numberOfIngredients = rand(0, 5);
                for ($i = 0; $i <= $numberOfIngredients; $i++) {
                    $mealIngredient = new MealIngredient();
                    $mealIngredient->meal_id = $meal->id;
                    $mealIngredient->ingredient_id = $ingredients->random();
                    $mealIngredient->save();
                }
            }
        });
    }
}
