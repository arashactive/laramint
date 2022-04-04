<div>
    <div class="row">
        <div class="col-12 mb-2">
            
            <div class="card border-left-{{ $activity->Workout($term, $session->id,  $sessionable->id )->count() > 0 ? $activity->color : 'secondary' }} bg-light shadow">
                <div class="card-body p-2 text-left">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-uppercase mb-1">
                                
                                
                                @if(
                                    $activity->Workout($term, $session->id,  $sessionable->id )->count() > 0 &&
                                    $activity->Workout($term, $session->id,  $sessionable->id)->first()->is_completed
                                    )
                                <i class="fa fa-check-circle text-success"></i>     
                                @else
                                <i class="{{ $activity->faIcon }}"></i>
                                @endif
                                
                               
                                <span class="pl-4">
                                    
                                    <a href="{{ route($activity->route,
                                     [
                                         'term' => $term, 
                                         'activity'=> $activity->id, 
                                         'session' => $session->id,
                                         'sessionable' => $sessionable->id
                                     ]) }}">
                                    
                                    @if(
                                        $activity->Workout($term, $session->id, $sessionable->id )->count() > 0                                        
                                        )
                                    <span>
                                        {{  $activity->title }}   
                                    </span>  
                                    @else
                                    <span class="text-secondary">
                                        {{  $activity->title }}   
                                    </span>
                                    @endif
                                  
                                                                 
                                    </a>
                                </span>
                            </div>
                            
                        </div>
                   
                    </div>
    
                </div>
            </div>
        </div>
    </div>
</div>