
<div class="row">

    <div class="col-lg-6">
        <div class="card shadow mb-4 border-bottom-success">
            <!-- Card Header - Dropdown -->
            <div
                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-success">{{ __("RoadMap") }}</h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
               
                @forelse ($term->Sessions as $session)
                    
                <x-box.session-item
                :title="$session->title" :color="'success'">
                

                @if(Auth::user()->hasRole('Super-Admin') || Auth::user()->hasAnyPermission(['term.edit' , 'session.edit']))

                @if(!$loop->first)
                @slot('up')
                    {{ route('orderChangeSession' , ['from' => $session->pivot->id , 'move' => 'up' ]) }}
                @endslot
                @endif

                @if(!$loop->last)
                    @slot('down')
                        {{ route('orderChangeSession' , ['from' => $session->pivot->id , 'move' => 'down' ]) }}
                    @endslot
                @endif
            
                @slot('delete')
                    {{ route('deleteSessionAsTerm' ,['term' => $term->id, 'session' => $session->id ]) }}
                @endslot
                
                @endcan
                
                
                <small>
                    <a href="{{ route('session.show', $session->id) }}" class="btn btn-success btn-sm">
                        {{ __('count of activity: ') }} 
                        <span class="badge badge-light">{{ $session->Sessionable->count() }}</span>
                        <span class="sr-only">unread messages</span>
                    </a>
                 
                </small>
               
                </x-box.item>

                @empty
                    
                @endforelse
               
            </div>
        </div>
    </div>
    
    <div class="col-lg-6">
        
        @if(Auth::user()->hasRole('Super-Admin') || Auth::user()->hasAnyPermission(['term.edit' , 'session.edit']))
        
        <div class="card shadow mb-4 border-bottom-success">
            <!-- Card Header - Dropdown -->
            <div
                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-success">{{ __("Sessions") }}</h6>
                <div class="dropdown no-arrow">
                    @can('session.create')
                    <x-CreateButton path="{{ route('session.create') }}" />
                    @endcan
                </div>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                @livewire('container.session-panel', [
                        'route' => 'addSessionToTerm',
                        'parent' => $term->id
                    ])
                
            </div>
        </div>

        @endcan

    </div>
</div>
