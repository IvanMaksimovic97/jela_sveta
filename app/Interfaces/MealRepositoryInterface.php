<?php

namespace App\Interfaces;

interface MealRepositoryInterface
{
    public function getMeals($lang, $per_page, $page, $category, $tags, $with, $diff_time);
}
