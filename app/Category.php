<?php

namespace App;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use Translatable;
    use SoftDeletes;

    public $translatedAttributes = ['title'];

    public $translationModel = CategoryTranslation::class;

    protected $table = 'category';
    protected $guarded = [];
}
