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
            $table->foreignId('excercise_id')->constrained('excercises')->onDelete('cascade');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->unsignedInteger('target_amount');
            $table->unsignedInteger('achieved_amount')->default(0);
            $table->unsignedInteger('target_weight');
            $table->unsignedInteger('achieved_weight')->default(0);
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
