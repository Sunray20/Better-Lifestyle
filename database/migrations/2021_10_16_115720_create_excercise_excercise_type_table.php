<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExcerciseExcerciseTypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('excercise_excercise_type', function (Blueprint $table) {
            $table->id();
            $table->foreignId('excercise_id')->constrained('excercises')->onDelete('cascade');
            $table->foreignId('excercise_type_id')->constrained('excercise_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('excercise_excercise_type');
    }
}
