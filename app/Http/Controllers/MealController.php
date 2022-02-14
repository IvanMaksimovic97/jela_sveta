<?php

namespace App\Http\Controllers;

use App\Faker\IngredientProvider;
use App\Faker\MealProvider;
use App\Http\Requests\GetMealsRequest;
use App\Interfaces\MealRepositoryInterface;
use Faker\Factory;
use Illuminate\Http\Request;

class MealController extends Controller
{
    private $mealRepository;

    public function __construct(MealRepositoryInterface $mealRepository)
    {
        $this->mealRepository = $mealRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(GetMealsRequest $request)
    {
        $meals = $this->mealRepository->getMeals(
            $request->lang, 
            $request->per_page, 
            $request->page, 
            $request->category, 
            $request->tags ? explode(',', $request->tags) : null, 
            $request->with ? explode(',', $request->with) : null,
            $request->diff_time
        );

        return response()->json($this->mealRepository->customMealResponse());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
