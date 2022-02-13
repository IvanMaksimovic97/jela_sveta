<?php

use App\Ingredient;
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

        DB::transaction(function() use ($ingredientsEn, $ingredientsFr) {
            for ($i=0; $i < count($ingredientsEn); $i++) {
                $ingredient = new Ingredient();
                $ingredient->slug = $ingredientsEn[$i];
                $ingredient->fill([
                    'title:en' => $ingredientsEn[$i],
                    'title:fr' => $ingredientsFr[$i]
                ]);
                $ingredient->save();
            }
        });
    }
}
