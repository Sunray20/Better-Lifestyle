<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIngredientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ingredients', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50);
            $table->unsignedInteger('calorie');
            $table->unsignedInteger('protein');
            $table->unsignedInteger('carb');
            $table->unsignedInteger('fat');
            $table->string('unit', 20);
            $table->double('weight', 8, 3);
            $table->string('image_path', 120);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ingredients');
    }
}
