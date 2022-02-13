<?php

use Faker\Factory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/', function () {
    //dd(config('app.locale'));
    
    $languages = ['en', 'fr'];

    $mealsEn = ['Cheese Pizza', 'Hamburger', 'Cheeseburger', 'Bacon Burger', 'Bacon Cheeseburger',
    'Little Hamburger', 'Little Cheeseburger', 'Little Bacon Burger', 'Little Bacon Cheeseburger',
    'Veggie Sandwich', 'Cheese Veggie Sandwich', 'Grilled Cheese',
    'Cheese Dog', 'Bacon Dog', 'Bacon Cheese Dog', 'Beef Bourguignon'];

    $mealsFr = ['Pizza au fromage', 'Hamburger', 'Cheeseburger', 'Hamburger au bacon', 'Cheeseburger au bacon',
    'Petit Hamburger', 'Petit Cheeseburger', 'Petit Bacon Burger', 'Petit Bacon Cheeseburger',
    'Sandwich Vegan', 'Sandwich Vegan au fromage', 'Fromage grillé',
    'Chien au Fromage', 'Chien au bacon', 'Chien au bacon et au fromage', 'Boeuf Bourguignons'];

    $ingredientsEn = [
        'Butter',
        'Egg',
        'Cheese',
        'Sour cream',
        'Mozzarella',
        'Yogurt',
        'Cream',
        'Milk'
    ];

    $ingredientsFr = [
        'Beurre',
        'Oeuf',
        'Fromage',
        'Crème aigre',
        'Mozzarella',
        'Yaourt',
        'Crème',
        'Lait',
    ];

    $data = [];
    foreach ($languages as $lng) {
        $class = 'FakerRestaurant\Provider\\'.$lng.'\Restaurant';
        $faker = Factory::create();
        $faker->addProvider(new $class($faker));
        $data[$lng] = $faker->foodName(); 
    }

    dd($data);

    $faker = Factory::create();
    $faker2 = Factory::create();
    $faker->addProvider(new \FakerRestaurant\Provider\en_US\Restaurant($faker));
    $faker2->addProvider(new \FakerRestaurant\Provider\fr_FR\Restaurant($faker));
    
    dd($faker->foodName(), $faker2->foodName());
    // dd($faker->foodName,      // A random Food Name
    // $faker->beverageName,  // A random Beverage Name
    // $faker->dairyName,  // A random Dairy Name
    // $faker->vegetableName,  // A random Vegetable Name
    // $faker->fruitName,  // A random Fruit Name
    // $faker->meatName,  // A random Meat Name
    // $faker->sauceName);  // A random Sauce Name
});
