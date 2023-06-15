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
        Schema::create('otp_mail_s_m_s', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->string('sms_request_id')->nullable();
            $table->string('mobile')->nullable();
            $table->string('mobile_otp')->nullable();
            $table->string('mobile_otp_from_url')->nullable();
            $table->dateTime('mobile_otp_sent_at')->nullable();
            $table->tinyInteger('is_mobile_verified')->default(0);
            $table->dateTime('mobile_otp_verified_at')->nullable();
            
            $table->string('mail')->nullable();
            $table->string('mail_otp')->nullable();
            $table->string('mail_otp_from_url')->nullable();
            $table->dateTime('mail_otp_sent_at')->nullable();
            $table->tinyInteger('is_mail_verified')->default(0);
            $table->dateTime('mail_otp_verified_at')->nullable();
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
        Schema::dropIfExists('otp_mail_s_m_s');
    }
};
