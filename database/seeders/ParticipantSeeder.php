<?php

namespace Database\Seeders;

use App\Models\Participant;
use App\Models\Role;
use App\Models\Term;
use App\Models\User;
use Illuminate\Database\Seeder;

class ParticipantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $adult = 1;
        $kids = 3;
        $teenage = 2;

        $supervisor = Role::where('name', 'supervisor')->first()->id;
        $mentor = Role::where('name', 'mentor')->first()->id;
        $student = Role::where('name', 'student')->first()->id;

        $this->participantAddTerm(
            $adult,
            [2 => $supervisor, 5 => $mentor, 8 => $student]
        );
        $this->participantAddTerm(
            $teenage,
            [4 => $supervisor, 7 => $mentor, 9 => $student]
        );
        $this->participantAddTerm(
            $kids,
            [3 => $supervisor, 6 => $mentor, 10 => $student]
        );
    }


    private function participantAddTerm($department_id, $users = [])
    {
        $terms = Term::with('Department')->whereHas('Department', function ($query) use ($department_id) {
            $query->where('id', $department_id);
        })->get();

        foreach ($terms as $term) {
            foreach ($users as $user => $role) {
                Participant::create([
                    'term_id' => $term->id,
                    'user_id' => $user,
                    'role_id' => $role,
                ]);
            }
        }
    }
}
