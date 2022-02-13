<?php

use App\Category;
use App\Meal;
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
        $mealsEn = ['Cheese Pizza', 'Hamburger', 'Cheeseburger', 'Bacon Burger', 'Bacon Cheeseburger',
        'Little Hamburger', 'Little Cheeseburger', 'Little Bacon Burger', 'Little Bacon Cheeseburger',
        'Veggie Sandwich', 'Cheese Veggie Sandwich', 'Grilled Cheese',
        'Cheese Dog', 'Bacon Dog', 'Bacon Cheese Dog', 'Beef Bourguignon'];
    
        $mealsFr = ['Pizza au fromage', 'Hamburger', 'Cheeseburger', 'Hamburger au bacon', 'Cheeseburger au bacon',
        'Petit Hamburger', 'Petit Cheeseburger', 'Petit Bacon Burger', 'Petit Bacon Cheeseburger',
        'Sandwich Vegan', 'Sandwich Vegan au fromage', 'Fromage grillé',
        'Chien au Fromage', 'Chien au bacon', 'Chien au bacon et au fromage', 'Boeuf Bourguignons'];

        $categories = Category::all()->pluck('id');

        DB::transaction(function() use ($mealsEn, $mealsFr, $categories) {
            for ($i=0; $i < count($mealsEn); $i++) {
                $meal = new Meal();
                $meal->category_id = $categories->random();
                $meal->fill([
                    'title:en' => $mealsEn[$i],
                    'title:fr' => $mealsFr[$i],
                    'description:en' => '',
                    'description:fr' => ''
                ]);
                $meal->save();
            }
        });
    }
}
