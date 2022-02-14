<?php

use App\Category;
use App\Faker\MealProvider;
use App\Language;
use App\Meal;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MealSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = Category::all()->pluck('id');
        $languages = Language::all()->pluck('locale')->toArray();

        $faker = Factory::create();
        $faker->addProvider(new MealProvider($faker));

        DB::transaction(function() use ($faker, $categories, $languages) {
            for ($i=0; $i < 10; $i++) {
                $randomMeal = $faker->mealNameWithTranslations($languages);
                $meal = new Meal();
                $meal->category_id = $categories->random();

                $data = [];

                foreach ($languages as $lang) {
                    $fakerLang = Factory::create($lang.'_'.strtoupper($lang));
                    $data['title:'.$lang] = $randomMeal[$lang];
                    $data['description:'.$lang] = $randomMeal[$lang].' - '.$fakerLang->realText();
                }

                $meal->fill($data);
                $meal->save();
            }
        });
    }
}
