<?php

namespace App\Utility\Modules\Terms;

use App\Models\Participant;
use App\Models\Session;
use App\Models\Workout;

use function PHPSTORM_META\map;

class SessionInfoGenerator
{

    public function getSessionStatistic(Session $session, Participant $participant): Session
    {

        $sessions =  Session::with('Related')
            ->find($session->id);

        return $sessions;
    }
}
