<div>
    <div class="row">
        <div class="col-12 mb-2">
            <div class="card border-left-secondary bg-light shadow">
                <div class="card-body p-4 text-left">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-4">
                            <div class="row">

                                <div class="col ml-3 align-middle">

                                    <div class="text-lg pt-2 font-weight-bold mb-1 text-secondary">
                                        {{ $session->title }}
                                    </div>

                                    <div class="mt-3">

                                        @forelse ($session->Related as $activity)
                                        
                                        <x-box.session-activity-item :activity="$activity" />
                                        @empty
                                        @endforelse
                                    </div>

                                </div>

                                <div class="col-4">
                                    
                                    <h6 class="font-weight-bold text-dark">{{ __('Grade') }}</h6>
                                    <hr />
                                    <label>{{ __('Progress Bar:') }}</label>
                                    <x-atoms.progress :color="'primary'" :fill="$session->workout_completed ?? 0" :count="$participant->Workout->count() ?? 0" />
                                    <hr />
                                    <span>Average Star:</span>
                                    <x-atoms.stars :score="$session->workout_score ?? 0" />

                                </div>
                            </div>

                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>