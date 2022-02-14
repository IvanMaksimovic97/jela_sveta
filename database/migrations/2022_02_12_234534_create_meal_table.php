<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMealTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meal', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('category_id')->index()->nullable()->default(null);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('category_id')->references('id')->on('category')->onDelete('cascade');
        });

        Schema::create('meal_translations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('meal_id')->index();
            $table->string('title');
            $table->string('description');
            $table->string('locale')->index();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('meal_id')->references('id')->on('meal')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('meal_translations');
        Schema::dropIfExists('meal');
    }
}
