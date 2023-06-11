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
        Schema::create('landing_pages', function (Blueprint $table) {
            $table->id();
            $table->string('landing_page_for')->nullable();
            $table->string('landing_page_title')->nullable();
            $table->string('landing_page_url')->nullable();
            $table->dateTime('landing_page_start_date')->nullable();
            $table->dateTime('landing_page_end_date')->nullable();
            $table->tinyInteger('status')->default(1)->comment('1 for enabled, 0 for disabled'); // 1 for enabled
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
        Schema::dropIfExists('landing_pages');
    }
};
