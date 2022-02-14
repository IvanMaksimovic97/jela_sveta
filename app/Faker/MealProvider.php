<?php

namespace App\Faker;

use Faker\Provider\Base;

class MealProvider extends Base
{
    private $availableLangs = ['en', 'fr', 'hr', 'ru', 'it', 'es'];

    private $en = ['Cheese Pizza', 'Hamburger', 'Cheeseburger', 'Bacon Burger', 'Bacon Cheeseburger',
    'Little Hamburger', 'Little Cheeseburger', 'Little Bacon Burger', 'Little Bacon Cheeseburger',
    'Veggie Sandwich', 'Cheese Veggie Sandwich', 'Grilled Cheese',
    'Cheese Dog', 'Bacon Dog', 'Bacon Cheese Dog', 'Beef Bourguignon'];

    private $fr = ['Pizza au fromage', 'Hamburger', 'Cheeseburger', 'Hamburger au bacon', 'Cheeseburger au bacon',
    'Petit Hamburger', 'Petit Cheeseburger', 'Petit Bacon Burger', 'Petit Bacon Cheeseburger',
    'Sandwich Vegan', 'Sandwich Vegan au fromage', 'Fromage grillé',
    'Chien au Fromage', 'Chien au bacon', 'Chien au bacon et au fromage', 'Boeuf Bourguignons'];

    private $hr = ['Pizza sa sirom', 'Hamburger', 'Čizburger', 'Burger sa slaninom', 'Čizburger sa slaninom',
    'Mali hamburger', 'Mali čizburger', 'Mali hamburger sa slaninom', 'Mali čizburger sa slaninom',
    'Sendvič s povrćem', 'Sendvič sa povrćem i sirom', 'Grilovani sir',
    'Hot dog sa sirom', 'Hot dog sa slaninom', 'Hot dog sa slaninom i sirom', 'Juneći gulaš'];

    private $ru = ['Пицца с сыром', 'Гамбургер', 'Чизбургер', 'Бургер с беконом', 'Чизбургер с беконом',
    'Маленький гамбургер', 'Маленький чизбургер', 'Маленький бургер с беконом','Маленький чизбургер с беконом',
    'Вегетарианский сэндвич', 'Вегетарианский сэндвич с сыром', 'Жареный сыр',
    'Сырная собака', 'Беконовая собака', 'Беконовая сырная собака', 'Говядина по-бургундски'];

    private $it = ['Pizza al formaggio', 'Hamburger', 'Hamburger al formaggio', 'Hamburger al bacon', 'Hamburger al bacon',
    'Hamburger piccolo', 'Cheeseburger piccolo', 'Bacon Burger piccolo', 'Bacon Cheeseburger piccolo',
    'Sandwich vegetariano', 'Sandwich vegetariano al formaggio', 'Formaggio grigliato',
    'Hot Dog con formaggio', 'Hot Dog con pancetta', 'Hot Dog con pancetta e formaggio', 'Beef Bourguignon'];

    private $es = ['Pizza con queso', 'Hamburguesa', 'Hamburguesa con queso', 'Hamburguesa con tocino', 'Hamburguesa con queso y tocino',
    'Hamburguesa pequeña', 'Hamburguesa pequeña con queso', 'Hamburguesa pequeña con tocino', 'Hamburguesa pequeña con queso y tocino',
    'Sándwich de verduras', 'Sándwich de verduras con queso', 'Queso a la plancha',
    'Perrito con queso', 'Perrito con tocino', 'Perrito con queso y tocino', 'Res Bourguignon'];

    public function mealNameWithTranslations(array $langs = ['hr', 'en', 'fr'])
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