<div>
    <div class="form-group row">
        <div class="col-sm-12 mb-3 mb-sm-0">
            <input type="text" 
                class="form-control form-control-user" 
                wire:model="search"
                placeholder="search name or email">
        </div>

     
    </div>
    
    <hr/>

    @forelse ($participants as $participant)   
    
        <x-box.participanet-item
        :title="$participant->name">
            
            @slot('theme')
                {{ 'bg-dark' }}
            @endslot

            @slot('add')
                {{ route($route ,[
                    'parent' => $parent ,
                    'question' => $participant->id 
                ]) }}
            @endslot

            
            <small>
                {{ $participant->email }}
                @forelse ($participant->Roles as $role)
                <x-buttons.pill name="role" count="{{ $role->name }}" theme="info" />
                @empty
                    
                @endforelse
            </small>
            
            

        </x-box.item>


    @empty
        
    @endforelse

    {{ $participants->links() }}
</div>
