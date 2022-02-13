<?php

namespace App;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ingredient extends Model
{
    use Translatable;
    use SoftDeletes;

    public $translatedAttributes = ['title'];

    public $translationModel = IngredientTranslation::class;

    protected $table = 'ingredient';
    protected $guarded = [];
}
