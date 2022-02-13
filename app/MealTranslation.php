<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MealTranslation extends Model
{
    use SoftDeletes;

    protected $table = 'meal_translations';
    protected $guarded = [];
}
