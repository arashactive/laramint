<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('workouts', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('participant_id');
            $table->foreign('participant_id')->references('id')->on('term_user');

            $table->unsignedBigInteger('sessionable_id');
            $table->foreign('sessionable_id')->references('id')->on('sessionables');

            $table->dateTime('date_first_view');
            $table->dateTime('date_last_view')->nullable();

            $table->boolean('is_completed')->default(false);
            $table->boolean('is_mentor')->default(false);

            $table->smallInteger('score')->default(0);
            $table->dateTime('date_get_score')->nullable();

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
        Schema::dropIfExists('workouts');
    }
};
