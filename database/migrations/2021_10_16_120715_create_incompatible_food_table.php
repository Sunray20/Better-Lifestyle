<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIncompatibleFoodTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('incompatible_food', function (Blueprint $table) {
            $table->id();
            $table->foreignId('diet_type_id')->constrained('diet_types')->onDelete('cascade');
            $table->foreignId('food_id')->constrained('foods')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('incompatible_food');
    }
}
