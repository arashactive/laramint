<div class="row">

    <div class="col-md-6">
    <select wire:model="questionType" class="form-control">
        <option value="TestQuestion">Test</option>
        <option value="TrueFalseQuestion">True and False</option>
        <option value="MultipleQuestion">Multiple Choice</option>
        <option value="EssayQuestion">Essay</option>
        <option value="UploadFileQuestion">Upload File By Student</option>
        <option value="ShortAnswerQuestion">Short Answer</option>
        <option value="MatchingCaseQuestion">Matching</option>
        <option value="VoiceRecordQuestion">Voice Record By student</option>
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
   
     

    <hr />
    @if($component)
      @livewire($component)
    @endif
</div>
