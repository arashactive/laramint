<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Testimonial::truncate();

        //
        \App\Models\Testimonial::factory()->create([
            'testimonial_msg' => 'My sister recommended that i take O level course at the ICET computer education. With the fact that I have no prior experience with computer languages, each and every trainer presents the topic to me in a way that makes it simple for me to comprehend. Everyday tasks are given to us to assist us with finding out more and they are an extraordinary guide. It\'s a positive experience all around.',
            'testimonial_by' => 'Anushka Parmar',
            'course' => 'O Level Course',
            'image' => 'anushka-parmar.jpeg',
            'rating' => '5',
        ]);
        //
        \App\Models\Testimonial::factory()->create([
            'testimonial_msg' => 'Best O-LEVEL coaching in Agra Monika ma\'am and Arvind sir is very supportive and cooperative, must visit ICET COMPUTER CENTRE',
            'testimonial_by' => 'Khushbu Verma',
            'course' => 'O Level Course',
            'image' => 'khushbu-verma.jpeg',
            'rating' => '5',
        ]);
        //
        \App\Models\Testimonial::factory()->create([
            'testimonial_msg' => 'मेरा नाम बाबर खान है ! में आगरा से हूं...
👉 ICET Computer Education 🖥️ से कोर्स करने के एडवांटेज 👇
1) Best Knowledge about your content
2) Good Excellence
3) Friendly Environment with Teachers
4) Advance practice before your exams
5) Boost your knowledge and update to your knowledge
6) perfect Practical Classes and Theory Classes
7) Weekly doubt solution session. !',
            'testimonial_by' => 'Babar',
            'course' => 'O Level foundation Course',
            'image' => 'Babar.jpeg',
            'rating' => '5',
        ]);
        
        //
        \App\Models\Testimonial::factory()->create([
            'testimonial_msg' => 'Hi, I am Ashish Kushwah I recently applied for an O-LEVEL course at ICET CENTRE Great experience. Amazing learning curve. Educators deal with the understudies and help them every way possible.',
            'testimonial_by' => 'Ashish Kushwah',
            'course' => 'O Level Course',
            'image' => 'Ashish-kushwah.jpg',
            'rating' => '5',
        ]);
        
        //
        \App\Models\Testimonial::factory()->create([
            'testimonial_msg' => 'Nice place to get computer knowledge and awareness. Learn a lot here about computer  in detail.',
            'testimonial_by' => 'Aman bajpayee',
            'course' => 'O Level foundation Course',
            'image' => 'Aman-bajpayee.jpeg',
            'rating' => '5',
        ]);
        
        //
        \App\Models\Testimonial::factory()->create([
            'testimonial_msg' => 'Best coaching institute, where students get to explore more about the topics. Each and every doubt of the student is cleared with huge patience.
Thank you!',
            'testimonial_by' => 'Bhoomika Nigota',
            'course' => 'O Level foundation Course',
            'image' => 'Bhoomika-nigota.jpeg',
            'rating' => '5',
        ]);
        
        //
        \App\Models\Testimonial::factory()->create([
            'testimonial_msg' => 'ICET up until this point has been the best thing that has happened to me… Its hard to track down such where individuals are so unique, so serious but so near one another… and with regards to the Establishment… its a paradise on the planet… " ICET has given me the stage to achieve everything I could ever hope for. It has offered me a chance to release my maximum capacity and to emerge my vocation objectives.',
            'testimonial_by' => 'Dharmendar',
            'course' => 'Web designing',
            'image' => '',
            'rating' => '5',
        ]);
        
        //
        \App\Models\Testimonial::factory()->create([
            'testimonial_msg' => 'ICET has provided me the platform to accomplish all my dreams. It has given me an opportunity to unleash my full potential and to materialize my career goals. ICET has prepared me to face every battle in corporate world.',
            'testimonial_by' => 'Neha Thakur',
            'course' => 'O Level',
            'image' => '',
            'rating' => '5',
        ]);
        
        //
        \App\Models\Testimonial::factory()->create([
            'testimonial_msg' => 'I generally get a high from the sort of energy that persuades grounds. There is such a huge amount to do in any event, when essentially nothing remains to be finished, from battling to complete tasks to scrambling for magie at 4am in the morning.',
            'testimonial_by' => 'Akash Jaishwal',
            'course' => 'CCC',
            'image' => '',
            'rating' => '5',
        ]);
        
        //
        \App\Models\Testimonial::factory()->create([
            'testimonial_msg' => 'Life at ICET is full of energy. The wide array of exercises going from vested parties to web based gaming occasions furnish everybody with sufficient chances to go past scholastics.',
            'testimonial_by' => 'Jyoti Sharma',
            'course' => 'CCC',
            'image' => '',
            'rating' => '5',
        ]);
    }
}
