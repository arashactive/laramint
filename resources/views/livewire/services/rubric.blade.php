<div class="col-12 text-left mt-4 p-4">

    <input type="hidden" wire:model="rubric_id" />
    <div class="form-group">
        <label for="titleofrubric">title</label>
        <input type="text" class="form-control" id="titleofrubric" wire:model="title">
        @error('title') <span class="error">{{ $message }}</span> @enderror
    </div>
    <div class="form-group">
        <label for="descriptionofrubric">description of rubric</label>
        <textarea class="form-control" id="descriptionofrubric" wire:model="description"></textarea>
        @error('description') <span class="error">{{ $message }}</span> @enderror
    </div>


    @forelse($bodies as $index => $body)
    <div class="row mb-4 p-2 border-bottom-secondary">
        <div class="col-1">
            <span>{{ $loop->iteration }}</span><br/>
            <button class="btn btn-sm btn-danger btn-circle" wire:click.prevent="removeBody('{{ $index }}')"><i class="fa fa-times"></i></button>
        </div>
        <div class="col-sm">
            @if($loop->first)
            <label for="title{{ $index }}">Title</label>
            @endif
            <textarea id="title{{ $index }}" class="form-control" type="text" wire:model="bodies.{{ $index }}.item_title"></textarea>
        </div>
        
        @forelse($bodies[$index]['cells'] as $cell_index => $cell)
        <div class="col-sm">
            <textarea placeholder="details" class="form-control" type="text" wire:model="bodies.{{ $index }}.cells.{{ $cell_index }}.title"></textarea>
            <br/>
            <input placeholder="score" class="form-control" min="0" max="10" type="number" wire:model="bodies.{{ $index }}.cells.{{ $cell_index }}.score"/>
        </div>
        @empty 
        @endforelse
        <div class="col-1">
          
            <button class="btn btn-sm btn-info btn-circle" wire:click.prevent="addCell('{{ $index }}')"><i class="fa fa-plus"></i></button>
        </div>

    </div>
    
    @empty 
    @endforelse
    
    <button wire:click.prevent="store" class="btn btn-primary btn-icon-split float-left">
        <span class="icon text-white-50">
            {{ __("save") }}
        </span>
    </button>

     <button wire:click.prevent="addNewBody" class="btn btn-success btn-icon-split float-right">
            <span class="icon text-white-50">
                <i class="fas fa-plus"></i>
            </span>
    </button>
        
    </form>    
</div>