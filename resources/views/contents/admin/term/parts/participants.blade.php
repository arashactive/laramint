

<div class="row">

    
    
    <div class="col">
        
        @if(Auth::user()->hasRole('Super-Admin') || Auth::user()->hasAnyPermission(['participant.edit' , 'participant.delete']))
        
        <div class="card shadow mb-4 border-bottom-warning">
            <!-- Card Header - Dropdown -->
            <div
                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-warning">{{ __("Participants") }}</h6>
                @can('user.create')
                    <x-CreateButton path="{{ route('user.create') }}" />
                @endcan
            </div>
            <!-- Card Body -->
            <div class="card-body">
                @livewire('container.participant', [
                        'term' => $term
                    ])
                
            </div>
        </div>

        @endcan

    </div>
</div>
