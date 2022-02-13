<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MealTag extends Model
{
    use SoftDeletes;

    protected $table = 'meal_tag';
    protected $guarded = [];
}
