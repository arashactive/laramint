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

    @forelse ($questions as $question)   
    
        <x-box.item
        :title="$question->title">
            
            @slot('theme')
                {{ 'bg-dark' }}
            @endslot

            @slot('add')
                {{ route($route ,[
                    'parent' => $parent ,
                    'question' => $question->id 
                ]) }}
            @endslot

        </x-box.item>


    @empty
        
    @endforelse

    {{ $questions->links() }}
</div>
