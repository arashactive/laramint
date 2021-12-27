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
        <x-container.File  
        :file="$file" 
        :first="$loop->first" 
        :last="$loop->last"
        :delete="false"
        :add="route($route ,[
            'document' => $document ,
            'file' => $file->id 
        ])">
        </x-container.File>

    @empty
        
    @endforelse

    {{ $files->links() }}
</div>
