<div>
    <div class="row">
        <div class="col-12 mb-2">
            <div class="card border-left-primary bg-light shadow">
                <div class="card-body p-4 text-left">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-4">
                            <div class="row">

                                <div class="col ml-3 align-middle">

                                    <div class="text-lg pt-2 font-weight-bold mb-1 text-primary">
                                        {{ $session->title }}
                                    </div>

                                    <div class="mt-3">

                                        @forelse ($session->relateds as $activity)

                                        <x-box.session-activity-item :activity="$activity" />
                                        @empty
                                        @endforelse
                                    </div>

                                </div>

                                <div class="col-4">

                                    <h6 class="font-weight-bold text-dark">{{ __('Grade') }}</h6>
                                    <hr />
                                    <label>{{ __('Progress Bar:') }}</label>
                                    <x-atoms.progress :color="'primary'" :fill="$session->info['workout']" :count="$session->info['total']" />
                                    <hr />
                                    <span>Average Star:</span>
                                    <x-atoms.stars :score="$session->info['score']" />

                                </div>
                            </div>

                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>