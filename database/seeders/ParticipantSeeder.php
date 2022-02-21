<?php

namespace Database\Seeders;

use App\Models\Participant;
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
        $terms = Term::all();
        $users = User::all();

        $terms->each(function ($term) use ($users) {
            $users->each(function ($user) use ($term) {
                $term->Participants()->attach(
                    $user,
                    ['role_id' => $user->Roles->first()->id]
                );
            });
        });

    }
}
