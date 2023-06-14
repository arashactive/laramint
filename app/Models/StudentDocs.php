<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentDocs extends Model
{
    use HasFactory;
//    protected $table = 'student_docs';
    protected $guarded = [];
    protected $fillable = ['user_id', 'name', 'mobile', 'email', 'father_name', 'dob', 'category', 'high_school_marks', 
        'high_school_grades', 'intermediate_marks', 'intermediate_grades', 'father_income', 'father_income_certificate',
        'photograph', 'signature', 'thumb_impression', 'aadhar_front','aadhar_back','aadhar_number','high_school_marksheet','intermediate_marksheet',
        'is_mobile_verified', 'is_email_verified', 'referrer_url'
        ];
}
