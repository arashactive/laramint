<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuizzesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quizzes', function (Blueprint $table) {
            $table->id();
            $table->string("title");
            $table->text('description');
            $table->smallInteger('attempt')->default(0);
            $table->smallInteger('duration')->default(0);
            $table->boolean('is_mentor')->default(false);
            $table->boolean('is_shuffle')->default(true);
            $table->smallInteger('min_pass_score')->default(80);
            $table->enum('show_question' , ['StepByStep' , 'OnePage'])->default('StepByStep');
            $table->smallInteger('random_question')->default(0);
            $table->softDeletes();
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
        Schema::dropIfExists('quizzes');
    }
}
