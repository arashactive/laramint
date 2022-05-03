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
        Schema::create('mentor_comments', function (Blueprint $table) {
            $table->id();
                
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');

            $table->text('body');
            
            $table->morphs('activable');
            
            $table->unsignedBigInteger('mentor_id');
            $table->foreign('mentor_id')->references('id')->on('users');
            
            $table->boolean('confirm')->default(false);
            $table->dateTime('confirm_date')->nullable();
            
            $table->boolean('interested')->nullable();
            $table->dateTime('interested_date')->nullable();
            
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
        Schema::dropIfExists('mentor_comments');
    }
};
