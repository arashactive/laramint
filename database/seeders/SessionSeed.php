<?php

namespace Database\Seeders;

use App\Models\Session;
use App\Models\Term;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SessionSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $sessions = [];
        #1 Session Software Training
        $sessions[] = \App\Models\Session::factory()->create([
            'title' => 'adults | session #1',
        ]);

        #2 Session Software Training
        $sessions[] = \App\Models\Session::factory()->create([
            'title' => 'adults | session #2',
        ]);

        #3 Session Software Training
        $sessions[] = \App\Models\Session::factory()->create([
            'title' => 'adults | session #3',
        ]);

        #4 Session Software Training
        $sessions[] = \App\Models\Session::factory()->create([
            'title' => 'adults | session #4',
        ]);

        $this->sessionsAddToTerm(1, $sessions);
        $sessions = [];

        # Custom Software Training
        #5 Session Custom Software Training
        $sessions[] = \App\Models\Session::factory()->create([
            'title' => 'Custom Software Training | session #1',
        ]);

        #6 Session Custom Software Training
        $sessions[] = \App\Models\Session::factory()->create([
            'title' => 'Custom Software Training | session #2',
        ]);

        #7 Session Custom Software Training
        $sessions[] = \App\Models\Session::factory()->create([
            'title' => 'Custom Software Training | session #3',
        ]);

        #8 Session Custom Software Training
        $sessions[] = \App\Models\Session::factory()->create([
            'title' => 'Custom Software Training | session #4',
        ]);


        $this->sessionsAddToTerm(2, $sessions);
        $sessions = [];

        # kids
        #9 Session Intergrate Software Training
        $sessions[] = \App\Models\Session::factory()->create([
            'title' => 'Intergrate Software Training | session #1',
        ]);

        #10 Session Intergrate Software Training
        $sessions[] = \App\Models\Session::factory()->create([
            'title' => 'Intergrate Software Training | session #2',
        ]);

        #11 Session Intergrate Software Training
        $sessions[] =  \App\Models\Session::factory()->create([
            'title' => 'Intergrate Software Training | session #3',
        ]);

        #12 Session Intergrate Software Training
        $sessions[] = \App\Models\Session::factory()->create([
            'title' => 'Intergrate Software Training | session #4',
        ]);

        $this->sessionsAddToTerm(3, $sessions);
        $sessions = [];
    }



    private function sessionsAddToTerm($department_id, $sessions = [])
    {
        $terms = Term::with('Department')->whereHas('Department', function ($query) use ($department_id) {
            $query->where('id', $department_id);
        })->get();

        foreach ($terms as $term) {
            foreach ($sessions as $session) {
                $term->Sessions()->sync([$session->id => [
                    'order' => $term->Sessions()->max('order') + 1
                ]], false);
            }
        }
    }
}
