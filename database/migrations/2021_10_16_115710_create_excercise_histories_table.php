<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExcerciseHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('excercise_histories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('excercise_id')->constrained('excercises');
            $table->foreignId('user_id')->constrained('users');
            $table->unsignedInteger('target_amount');
            $table->unsignedInteger('achieved_amount');
            $table->unsignedInteger('target_weight');
            $table->unsignedInteger('achieved_weight');
            $table->date('date');
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
        Schema::dropIfExists('excercise_histories');
    }
}
