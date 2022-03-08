
@if(Auth::user()->hasRole('Super-Admin') || Auth::user()->hasAnyPermission(['participant.edit' , 'participant.delete']))
<div class="row">

    <div class="col-lg-6">
        <div class="card shadow mb-4 border-bottom-warning">
            <!-- Card Header - Dropdown -->
            <div
                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-warning">{{ __("Participants") }}</h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
               
                @forelse ($term->Participants as $participant)
                
                <x-box.item
                :title="$participant->email">
                           
                @slot('delete')
                    {{ route('deleteParticipantAsTerm' ,['term' => $term, 'user' => $participant->id  ]) }}
                @endslot
                
                <small>
                    
                    <button type="button" class="badge bg-primary position-relative">
                        {{ $participant->name }}  
                    </button>
                    <button type="button" class="badge bg-info position-relative">
                        {{ $participant->Role()->name }}
                    </button>
                    
                </small>
               
                </x-box.item>

                @empty
                    
                @endforelse
               
            </div>
        </div>
    </div>
    
    <div class="col-lg-6">
        
        
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
                        'route' => 'addParticipantToTerm',
                        'parent' => $term->id
                    ])
                
            </div>
        </div>

    </div>
</div>
@endcan