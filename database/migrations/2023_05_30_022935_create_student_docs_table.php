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
        Schema::create('student_docs', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('name')->nullable();
            $table->string('mobile')->nullable();
            $table->string('email')->nullable();
            $table->string('father_name')->nullable();
            $table->string('dob')->nullable();
            $table->tinyInteger('category')->default(0)->comment('1 for General, 2 for OBC, 3 for SC, 4 for ST, 5 for Others');
            $table->float('high_school_marks')->nullable();
            $table->string('high_school_grades')->nullable();
            $table->float('intermediate_marks')->nullable();
            $table->string('intermediate_grades')->nullable();
            $table->decimal('father_income',15,2)->nullable();
            $table->string('father_income_certificate')->nullable();

            $table->string('photograph')->nullable();
            $table->string('signature')->nullable();
            $table->string('thumb_impression')->nullable();
            $table->string('aadhar_front')->nullable();
            $table->string('aadhar_back')->nullable();
            $table->string('aadhar_number')->nullable();
            $table->string('high_school_marksheet')->nullable();
            $table->string('intermediate_marksheet')->nullable();
            $table->tinyInteger('is_mobile_verified')->default(0)->comment('1 for verified, 0 for unverified'); // 1 for verified
            $table->tinyInteger('is_email_verified')->default(0)->comment('1 for verified, 0 for unverified'); // 1 for verified
            $table->string('referrer_url')->nullable();
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
        Schema::dropIfExists('student_docs');
    }
};
