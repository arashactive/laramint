<div class="row">
    
      <div class="col-md-4">
        <label for="questionTypeId">{{ __('Question type:') }}</label>
        <select id="questionTypeId" wire:model="questionTypeId" class="form-control">
            @forelse ($questionTypes as $types)
                <option value="{{ $types->id }}">{{ str_replace('Question' , '' ,  $types->title) }}</option>
            @empty
                
            @endforelse

        </select>
      </div>
      <div class="col-md-2 d-flex align-content-end flex-wrap">
          
          <button id="btnQuestionCreate" type="button" wire:click.prevent="selectQuestionType()" class="btn btn-primary btn-icon-split">
              <span class="icon text-white-50">
                <i class="fas fa-flag"></i>
              </span>
              <span class="text">create</span>
          </button>
      </div>
      @if($quiz)
      <div class="col-md-4">
        <label for="quiz_selected">{{ __('Quiz selecte:') }}</label>
        <select id="quiz_selected" class="form-control" disabled>
        <option>{{ $quiz->title ?? ''}}</option> 
      </select>
      </div>
      
      @endif
   

    

    @if($component)
      @livewire($component,[
        'questionTypeId' => $questionTypeId,
        'question' => $question,
        'quiz' => $quiz
        ]
      , key($component))
    @endif
</div>
