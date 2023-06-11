<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OtpMailSMS extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $fillable = ['user_id', 'mobile', 'mobile_otp', 'mobile_otp_sent_at', 'aadhar_front','aadhar_back','aadhar_number','high_school_marksheet','intermediate_marksheet'];    
}
