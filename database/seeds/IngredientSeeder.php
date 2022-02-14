<?php

use App\Faker\IngredientProvider;
use App\Ingredient;
use App\Language;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IngredientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $languages = Language::all()->pluck('locale')->toArray();

        $faker = Factory::create();
        $faker->addProvider(new IngredientProvider($faker));

        DB::transaction(function() use ($languages, $faker) {
            for ($i=0; $i < 5; $i++) {
                $randomIngredient = $faker->ingredientNameWithTranslations($languages);
                $ingredient = new Ingredient();
                $ingredient->slug = 'ingredient-'.$i;

                $data = [];

                foreach ($languages as $lang) {
                    $data['title:'.$lang] = $randomIngredient[$lang];
                }

                $ingredient->fill($data);
                $ingredient->save();
            }
        });
    }
}
