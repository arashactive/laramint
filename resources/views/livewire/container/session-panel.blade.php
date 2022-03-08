<div>
    <div class="form-group row">
        <div class="col-sm-12 mb-3 mb-sm-0">
            <input type="text" 
                class="form-control form-control-user" 
                wire:model="search"
                placeholder="search session">
        </div>

     
    </div>
    
    <hr/>

    @forelse ($sessions as $session)   
    
    <x-box.item
    :title="$session->title">
        
        @slot('theme')
            {{ 'bg-dark' }}
        @endslot

        @slot('add')
            {{ route($route ,[
                'term' => $parent ,
                'session' => $session->id 
            ]) }}
        @endslot

    </x-box.item>


    @empty
        
    @endforelse

    {{ $sessions->links() }}
</div>
