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
                 @forelse ($participant->Roles as $role)
                
                 <a href="{{ route($route ,[
                    'term_id' => $parent ,
                    'user_id' => $participant->id,
                    'role_id' => $role->id,
                    ]) }}"  class="btn btn-sm btn-success">
                <small><i class="fas fa-plus text-dark-300"></i> {{ $role->name }}</small>
                 </a>

                @empty
                    
                @endforelse
                
            @endslot

            
            <small>
                {{ $participant->email }}
                
            </small>
            
            

        </x-box.item>


    @empty
        
    @endforelse

    {{ $participants->links() }}
</div>
