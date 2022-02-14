<?php

namespace App\Repositories;

use App\Interfaces\MealRepositoryInterface;
use App\Language;
use App\Meal;
use Carbon\Carbon;
use Illuminate\Support\Facades\App;
use stdClass;

class MealRepository implements MealRepositoryInterface
{
    private $mealModel, $dataResult, $lang, $per_page, $page, $category, $tags, $with, $diff_time, $langs;

    public function __construct(Meal $mealModel)
    {
        $this->mealModel = $mealModel;
        $this->langs = Language::all()->pluck('locale')->toArray();
    }

    private function setFilters($lang, $per_page, $page, $category, $tags, $with, $diff_time)
    {
        $this->lang = $lang;
        $this->per_page = $per_page;
        $this->page = $page;
        $this->category = $category;
        $this->tags = $tags;
        $this->with = $with;
        $this->diff_time = $diff_time;
    }

    public function getMeals($lang, $per_page, $page, $category, $tags, $with, $diff_time)
    {
        $this->setFilters($lang, $per_page, $page, $category, $tags, $with, $diff_time);

        App::setlocale('en');

        if (in_array($lang, $this->langs)) {
            App::setlocale($lang);
        }
        
        $query = $this->mealModel;

        if ($with) {
            $query = $query->with($with);
        }

        if ($category) {
            $query = $query->where('category_id', $category);
        }

        if ($tags) {
            $query = $query->whereHas('tags', function ($q) use ($tags) {
                $q->whereIn('tag.id', $tags);
            });
        }

        if ($diff_time) {
            $query = $query->where(function ($q) use ($diff_time) {
                $q->where('created_at', '>=', Carbon::createFromTimestamp($diff_time))
                    ->orWhere('updated_at', '>=', Carbon::createFromTimestamp($diff_time))
                    ->orWhere('deleted_at', '>=', Carbon::createFromTimestamp($diff_time));
            });
        }

        $this->dataResult = $query->paginate($per_page)->appends(request()->query());
        return $this->dataResult;
    }

    public function customMealResponse()
    {
        $obj = new stdClass;
        $obj->meta = new stdClass;
        $obj->data = [];
        $obj->links = new stdClass;

        $obj->meta->current_page = $this->dataResult->currentPage();
        $obj->meta->totalItems = $this->dataResult->total();
        $obj->meta->itemsPerPage = (int) $this->dataResult->perPage();
        $obj->meta->totalPages = $this->dataResult->lastPage();

        foreach ($this->dataResult as $item) {
            $itemObj = new stdClass;
            $itemObj->id = $item->id;
            $itemObj->title = $item->title;
            $itemObj->description = $item->description;
            $itemObj->stauts = $item->deleted_at ? 'deleted' : 'created';

            if ($this->with) {
                if (in_array('category', $this->with)) {
                    if ($item->category) {
                        $itemObj->category = new stdClass;
                        $itemObj->category->id = $item->category->id;
                        $itemObj->category->title = $item->category->title;
                        $itemObj->category->slug = $item->category->slug;
                    }
                    else {
                        $itemObj->category = null;
                    }
                }
                
                if (in_array('tags', $this->with)) { 
                    $itemObj->tags = [];
    
                    foreach ($item->tags as $tag) {
                        $itemObjTag = new stdClass;
                        $itemObjTag->id = $tag->id;
                        $itemObjTag->title = $tag->title;
                        $itemObjTag->slug = $tag->slug;
    
                        $itemObj->tags[] = $itemObjTag;
                    }
                }

                if (in_array('ingredients', $this->with)) { 
                    $itemObj->ingredients = [];
    
                    foreach ($item->ingredients as $ingredient) {
                        $itemObjIngredient = new stdClass;
                        $itemObjIngredient->id = $ingredient->id;
                        $itemObjIngredient->title = $ingredient->title;
                        $itemObjIngredient->slug = $ingredient->slug;
    
                        $itemObj->ingredients[] = $itemObjIngredient;
                    }
                }
            }

            $obj->data[] = $itemObj;
        }

        $obj->links->prev = $this->dataResult->previousPageUrl();
        $obj->links->next = $this->dataResult->nextPageUrl();
        $obj->links->self = $this->dataResult->url($this->page);

        return $obj;
    }
}
