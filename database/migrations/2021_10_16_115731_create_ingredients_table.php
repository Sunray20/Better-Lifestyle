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
            $table->foreignId('user_id')->constrained('users')->default(0);
            $table->string('name', 50);
            $table->unsignedInteger('calorie');
            $table->double('protein', 5, 1);
            $table->double('carb', 5, 1);
            $table->double('fat', 5, 1);
            $table->enum('unit', ['g', 'pound', 'dL', 'mL']);
            $table->double('amount', 8, 3);
            $table->string('image_path', 120)->nullable();
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
