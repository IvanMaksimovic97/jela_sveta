<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MealIngredient extends Model
{
    use SoftDeletes;

    protected $table = 'meal_ingredient';
    protected $guarded = [];
}
