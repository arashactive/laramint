<div>
    <div class="form-group row">
        <div class="col-sm-12 mb-3 mb-sm-0">
            <input type="text" 
                class="form-control form-control-user" 
                wire:model="search"
                placeholder="Search">
        </div>
    </div>
    
    <hr/>

    @forelse ($files as $file)   
    
        <x-box.item
        :title="$file->description">
            
            @slot('theme')
                {{ 'bg-dark' }}
            @endslot

            @slot('add')
                {{ route($route ,[
                    'document' => $document ,
                    'file' => $file->id 
                ]) }}
            @endslot

        </x-box.item>


    @empty
        
    @endforelse

    {{ $files->links() }}
</div>
