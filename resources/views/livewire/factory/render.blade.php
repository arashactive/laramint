<div class="row">

    <div class="col-md-6">
    <select wire:model="questionTypeId" class="form-control">
        @forelse ($questionTypes as $types)
            <option value="{{ $types->id }}">{{ str_replace('Question' , '' ,  $types->title) }}</option>
        @empty
            
        @endforelse

    </select>
    </div>
    <div class="col-md-6">
         <button type="button" wire:click.prevent="selectQuestionType()" class="btn btn-primary btn-icon-split">
            <span class="icon text-white-50">
              <i class="fas fa-flag"></i>
            </span>
            <span class="text">create</span>
         </button>
    </div>

    @if($component)
      @livewire($component, ['questionTypeId' => $questionTypeId , 'question' => $question])
    @endif
</div>
