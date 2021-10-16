<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('unit', 50);
            $table->double('weight', 4, 1);
            $table->double('target_weight', 4, 1);
            $table->enum('diet_goal', ['maintain', 'bulk', 'cut']);
            $table->unsignedInteger('target_kcal');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['unit', 'weight', 'target_weight', 'diet_goal', 'target_kcal']);
        });
    }
}
