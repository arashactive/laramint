<?php

namespace Tests\Feature;

use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class StudentMailTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
    
    public function test_email()
    {
        $student_mobile = $request->student_mobile;
        $student_email = $request->student_email;
        $user_id = $request->user_id;
        $otp_code = rand(100001, 999999);
        $response = $this->post('/sendMailOTP', [
            'name' => 'Brij Developer',
            'email' => 'brij.raj.singh2710@gmail.com',
            'student_mobile' => '7618565004',
        ]);

        $response->assertStatus(200);
    }
}
