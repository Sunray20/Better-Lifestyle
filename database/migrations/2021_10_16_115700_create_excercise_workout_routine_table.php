<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExcerciseWorkoutRoutineTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('excercise_workout_routine', function (Blueprint $table) {
            $table->id();
            $table->foreignId('excercise_id')->constrained('excercises');
            $table->foreignId('workout_routine_id')->constrained('workout_routines');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('excercise_workout_routine');
    }
}
