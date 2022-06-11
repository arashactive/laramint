<div class="row">

    <div class="col-6">


        @forelse ($term->Participants as $participant)

        <x-box.item :title="$participant->email">

            <small>

                <button type="button" class="badge bg-primary position-relative">
                    {{ $participant->name }}
                </button>
                <button type="button" class="badge bg-info position-relative">
                    {{ $participant->Role()->name }}
                </button>

            </small>
            @if(Auth::user()->hasRole('Super-Admin') || Auth::user()->hasAnyPermission(['participant.edit' , 'participant.delete']))
            @slot('ButtonLiveWire')
            <small>
                <button wire:click="deleteParticipantAsTerm({{ $participant->pivot->id }})" class="btn btn-circle btn-sm btn-danger">
                    <small><i class="fas fa-times text-dark-300"></i></small>
                </button>
            </small>
            @endslot


            @endcan
        </x-box.item>

        @empty

        @endforelse

    </div>


    <div class="col-6">
        <div>
            <div class="form-group row">
                <div class="col-sm-12 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user" wire:model="search" placeholder="search name or email">
                </div>


            </div>

            <hr />

            @forelse ($users as $user)

            <x-box.participanet-item :title="$user->name">

                @slot('theme')
                {{ 'bg-dark' }}
                @endslot

                @slot('add')

                @forelse ($user->Roles as $role)

                <button wire:click="addParticipantToTerm({{ $user }}, {{ $role }})" class="btn btn-sm btn-success">
                    <small><i class="fas fa-plus text-dark-300"></i> {{ $role->name }}</small>
                </button>

                @empty

                @endforelse

                @endslot


                <small>
                    {{ $user->email }}

                </small>



                </x-box.item>


                @empty

                @endforelse

                {{ $users->links() }}
        </div>
    </div>
</div>