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
                                            <a href="{{ route('learningCourse', $term->id) }}">
                                                {{  $term->title }}    
                                            </a>
                                            <small>{{ $term->Department->title }} | {{ $term->Course->title }}</small>
                                        </div>

                                        {{ $slot }}
                         
                                        <x-atoms.progress
                                        :color="'progress-bar-striped bg-success'"
                                        :fill="$term->Workout
                                        ->where('user_id', $user->id)
                                        ->where('is_completed', 1)->count()"
                                        :count="$term->allActivities->count()"
                                        ></x-atoms.progress>

                                </div>
                            </div>                            
                            
                        </div>
                        
                    </div>
    
                </div>
            </div>
        </div>
    </div>
</div>