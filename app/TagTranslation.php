<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TagTranslation extends Model
{
    use SoftDeletes;

    protected $table = 'tag_translations';
    protected $guarded = [];
}
