<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CategoryTranslation extends Model
{
    use SoftDeletes;

    protected $table = 'category_translations';
    protected $guarded = [];
}
