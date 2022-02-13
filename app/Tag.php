<?php

namespace App;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tag extends Model
{
    use Translatable;
    use SoftDeletes;

    public $translatedAttributes = ['title'];

    public $translationModel = TagTranslation::class;

    protected $table = 'tag';
    protected $guarded = [];
}
