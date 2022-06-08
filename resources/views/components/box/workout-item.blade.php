<div>
    <div class="row">

        <div class="col-12 mb-2">

            <div class="card border-left-{{ $workout->Sessionable->Model ? $workout->Sessionable->Model->color : 'secondary' }} bg-light shadow">
                <div class="card-body p-2 text-left">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-uppercase mb-1">


                                @if(
                                $workout->is_completed
                                )

                                <i class="fa fa-check-circle text-success"></i>
                                @else
                                <i class="{{ $workout->Sessionable->Model->faIcon }}"></i>
                                @endif


                                <span class="pl-4">
                                    <a @if($workout->is_completed)
                                        href="{{ route('reviewWorkout' , [
                                            'participant' => $workout->participant_id,
                                            'workout' => $workout->id
                                        ]) }}"
                                        @endif >

                                        <span class="{{ $workout ? '' : 'text-secondary' }}">
                                            {{ $workout->Sessionable->Model->title }}
                                        </span>

                                    </a>
                                </span>
                            </div>

                        </div>

                        <div class="d-flex flex-row-reverse">
                            @if($workout->score)
                            <x-atoms.stars :score="$workout->score" />
                            @endif
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>