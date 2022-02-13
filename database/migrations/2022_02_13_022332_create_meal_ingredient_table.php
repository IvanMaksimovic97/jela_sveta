<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMealIngredientTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meal_ingredient', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('meal_id')->index();
            $table->unsignedBigInteger('ingredient_id')->index();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('meal_id')->references('id')->on('meal')->onDelete('cascade');
            $table->foreign('ingredient_id')->references('id')->on('ingredient')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('meal_ingredient');
    }
}
