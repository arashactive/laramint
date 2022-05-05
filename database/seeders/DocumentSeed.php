<?php

namespace Database\Seeders;

use App\Models\File;
use App\Models\Session;
use Illuminate\Database\Seeder;

class DocumentSeed extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        #adult
        #1
        $file = \App\Models\File::factory()->create([
            'title' => 'Adult Video #1',
            'description' => 'Adult Video #1',
            'file' => 'mp4/xKOV4ySeFiaZPLiDOHNgX7B8zd0zglaA59SLzCDG.mp4',
            'file_size' => '21811717',
            'file_type' => 'mp4'
        ]);
        $this->addFileToSession(1, $file);

        
        #2
        $file =\App\Models\File::factory()->create([
            'title' => 'Adult Video #2',
            'description' => 'Adult Video #2',
            'file' => 'mp4/qL6j3BRb8QzaE9eNU5oHLBI8jfZZlVcnvZnrXS3p.mp4',
            'file_size' => '39459508',
            'file_type' => 'mp4'
        ]);
        $this->addFileToSession(2, $file);

        #3
        $file =\App\Models\File::factory()->create([
            'title' => 'Adult Video #3',
            'description' => 'Adult Video #3',
            'file' => 'mp4/sonP7sjdDpbBx9AZP2KQaAl9YlolYo3JI6gOshBA.mp4',
            'file_size' => '6334218',
            'file_type' => 'mp4'
        ]);
        $this->addFileToSession(3, $file);

        #4
        $file =\App\Models\File::factory()->create([
            'title' => 'Adult Video #4',
            'description' => 'Adult Video #4',
            'file' => 'mp4/xKOV4ySeFiaZPLiDOHNgX7B8zd0zglaA59SLzCDG.mp4',
            'file_size' => '21811717',
            'file_type' => 'mp4'
        ]);
        $this->addFileToSession(4, $file);


        #kids
        #5
        $file =\App\Models\File::factory()->create([
            'title' => 'Kids Video #1',
            'description' => 'Kids Video #1',
            'file' => 'mp4/B9LiL7uwjnhgapUTIwLBjjlVbz9Xf3iTCrDMSnfp.mp4',
            'file_size' => '20175977',
            'file_type' => 'mp4'
        ]);
        $this->addFileToSession(5, $file);

        #6
        $file =\App\Models\File::factory()->create([
            'title' => 'Kids Video #2',
            'description' => 'Kids Video #2',
            'file' => 'mp4/KY2eNP2eaH1WQbmffUhexMs0gWP4W0FKSCa65JJG.mp4',
            'file_size' => '16354492',
            'file_type' => 'mp4'
        ]);
        $this->addFileToSession(6, $file);

        #7
        $file =\App\Models\File::factory()->create([
            'title' => 'Kids Video #3',
            'description' => 'Kids Video #3',
            'file' => 'mp4/B9LiL7uwjnhgapUTIwLBjjlVbz9Xf3iTCrDMSnfp.mp4',
            'file_size' => '20175977',
            'file_type' => 'mp4'
        ]);
        $this->addFileToSession(7, $file);

        #8
        $file =\App\Models\File::factory()->create([
            'title' => 'Kids Video #4',
            'description' => 'Kids Video #4',
            'file' => 'mp4/KY2eNP2eaH1WQbmffUhexMs0gWP4W0FKSCa65JJG.mp4',
            'file_size' => '16354492',
            'file_type' => 'mp4'
        ]);
        $this->addFileToSession(8, $file);


        #teenage
        #9
        $file =\App\Models\File::factory()->create([
            'title' => 'Teenage Video #1',
            'description' => 'Teenage Video #1',
            'file' => 'mp4/KY2eNP2eaH1WQbmffUhexMs0gWP4W0FKSCa65JJG.mp4',
            'file_size' => '21811717',
            'file_type' => 'mp4'
        ]);
        $this->addFileToSession(9, $file);
        
        #10
        $file =\App\Models\File::factory()->create([
            'title' => 'Teenage Video #2',
            'description' => 'Teenage Video #2',
            'file' => 'mp4/qL6j3BRb8QzaE9eNU5oHLBI8jfZZlVcnvZnrXS3p.mp4',
            'file_size' => '39459508',
            'file_type' => 'mp4'
        ]);
        $this->addFileToSession(10, $file);

        #11
        $file =\App\Models\File::factory()->create([
            'title' => 'Teenage Video #3',
            'description' => 'Teenage Video #3',
            'file' => 'mp4/KY2eNP2eaH1WQbmffUhexMs0gWP4W0FKSCa65JJG.mp4',
            'file_size' => '6334218',
            'file_type' => 'mp4'
        ]);
        $this->addFileToSession(11, $file);

        #12
        $file =\App\Models\File::factory()->create([
            'title' => 'Teenage Video #4',
            'description' => 'Teenage Video #4',
            'file' => 'mp4/xKOV4ySeFiaZPLiDOHNgX7B8zd0zglaA59SLzCDG.mp4',
            'file_size' => '21811717',
            'file_type' => 'mp4'
        ]);
        $this->addFileToSession(12, $file);
        
    }

    public function addFileToSession($session, $file){
        $session = Session::findorfail($session);
        $session->Files()->attach(
            $file,
            ['order' => $session->Sessionable()->max('order') + 1]
        );
    }
}
