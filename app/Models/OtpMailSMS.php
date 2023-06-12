<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OtpMailSMS extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $fillable = ['user_id', 'mobile', 'mobile_otp','mobile_otp_from_url', 'mobile_otp_sent_at', 'is_mobile_verified','mobile_otp_verified_at',
        'mail','mail_otp','mail_otp_from_url','mail_otp_sent_at','is_mail_verified','mail_otp_verified_at'];    
}
