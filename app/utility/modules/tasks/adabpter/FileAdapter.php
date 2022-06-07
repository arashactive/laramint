<?php

namespace App\Utility\Modules\Tasks\Adabpter;

use App\Models\Participant;
use App\Models\Sessionable;
use App\Models\Term;
use App\Models\Workout;
use App\Utility\File\FileFactory;
use App\Utility\Modules\Tasks\Services\TaskParent;
use App\Utility\Workout\WorkoutService;

class FileAdapter extends TaskParent
{
    protected string $view = 'contents.learn.document.show';

    public bool $is_mentor = false;


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function Render(Participant $participant, Sessionable $sessionable)
    {

        $workout = WorkoutService::WorkOutSyncForThisExcersice($participant, $sessionable, $this->user);

        $activity = $sessionable->Model;
        
        $file = '';
        if (!empty($activity))
            $file = FileFactory::Build($activity)->makeRenderFile();

        $review = $this->Review($workout);

        return view($this->view, compact([
            'activity', 'workout', 'participant', 'file', 'review'
        ]));
    }

    public function Review(Workout $workout): bool
    {
        if ($workout->is_completed == 1) {
            return true;
        }

        return false;
    }

    public function Mentor(): void
    {
        $this->is_mentor = true;
    }
}
