<?php

namespace App\Faker;

use Faker\Provider\Base;

class IngredientProvider extends Base
{
    private $availableLangs = ['en', 'fr', 'hr', 'ru', 'it', 'es'];

    private $en = [
        'Butter',
        'Egg',
        'Cheese',
        'Sour cream',
        'Mozzarella',
        'Yogurt',
        'Cream',
        'Milk'
    ];

    private $fr = [
        'Beurre',
        'Oeuf',
        'Fromage',
        'Crème aigre',
        'Mozzarella',
        'Yaourt',
        'Crème',
        'Lait',
    ];

    private $hr = [
        'Maslac',
        'Jaje',
        'Sir',
        'Kiselo vrhnje',
        'Mozzarella',
        'Jogurt',
        'Krema',
        'Mlijeko'
    ];

    private $ru = [
        'Масло сливочное',
        'Яйцо',
        'Сыр',
        'Сметана',
        'Моцарелла',
        'Йогурт',
        'Крем',
        'Молоко'
    ];

    private $it = [
        'Burro',
        'Uovo',
        'Il formaggio',
        'Panna acida',
        'Mozzarella',
        'Yogurt',
        'Crema',
        'Latte'
    ];

    private $es = [
        'Manteca',
        'Huevo',
        'Queso',
        'CCrea agria',
        'Queso Mozzarella',
        'Yogur',
        'Crema',
        'Leche'
    ];

    public function ingredientNameWithTranslations(array $langs = ['hr', 'en', 'fr'])
    {   
        $element = self::randomElement($this->en);
        $key = array_search($element, $this->en);

        $returnItem = [];

        foreach ($langs as $lang) {
            $returnItem[$lang] = $this->$lang[$key];
        }

        return $returnItem;
    }
}