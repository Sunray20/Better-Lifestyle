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
            $table->boolean('is_admin')->default(false);
            $table->string('unit', 50)->default('kg');
            $table->double('weight', 4, 1)->default('70');
            $table->double('target_weight', 4, 1)->default('75');
            $table->enum('diet_goal', ['maintain', 'bulk', 'cut'])->default('maintain');
            $table->unsignedInteger('target_kcal')->default('2000');
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
            $table->dropColumn(['is_admin', 'unit', 'weight', 'target_weight', 'diet_goal', 'target_kcal']);
        });
    }
}
