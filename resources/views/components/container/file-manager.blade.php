<div>


    <form class="user">
        <div class="form-group row">
            <div class="col-sm-12 mb-3 mb-sm-0">
                <input name="search" type="text" 
                    class="form-control form-control-user" id="search"
                    wire:model="search"
                    placeholder="Search" value="{{ $search ?? '' }}">
            </div>
        </div>
        
    </form>    
    
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
</div>



