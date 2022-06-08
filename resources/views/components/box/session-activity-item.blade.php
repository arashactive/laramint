<div>
    <div class="row">

        <div class="col-12 mb-2">

            <div class="card border-left-{{ $activity->Workout ? $activity->Model->color : 'secondary' }} bg-light shadow">
                <div class="card-body p-2 text-left">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-uppercase mb-1">
                                

                                @if(
                                $activity->Workout &&
                                $activity->Workout->is_completed
                                )

                                <i class="fa fa-check-circle text-success"></i>
                                @else
                                <i class="{{ $activity->faIcon }}"></i>
                                @endif

                                
                                <span class="pl-4">
                                    <a href="{{ $activity->Route }}" class="text-secondary">

                                        <span class="{{ $activity->Workout ? '' : 'text-secondary' }}">
                                            {{ $activity->Model->title }}
                                        </span>

                                    </a>
                                </span>
                            </div>

                        </div>

                        <div class="d-flex flex-row-reverse">
                            @if(isset($activity->Workout->score))
                            <x-atoms.stars :score="$activity->Workout->score" />
                            @endif
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>