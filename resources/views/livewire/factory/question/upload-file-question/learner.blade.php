<div id="question-{{ $question->id }}" class="question col-12 text-left mt-4 p-4">

    <div class="card shadow p-2">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{ $question->title }}</h6>
        </div>
        <div class="card-body">
            <form class="workout_questions" 
                enctype="multipart/form-data"
                id="question-{{ $question->id }}" 
                method="post" action="{{ route("quizWorkout") }}">
                @csrf 
                
                <input type="hidden" value="{{ $question->id }}" name="question_id">
                <input type="hidden" value="{{ $workout->id }}" name="workout_id">
            <p>
                {{ $question->question_body }}
            </p>
            
            <label class="font-weight-bold">@lang('max size: ')</label>
            <span class="text-secondary text-sm">{{ $answer->answers->max_size }}<sub>(kb)</sub> | </span>
            <label class="font-weight-bold">@lang('min size: ')</label> 
            <span class="text-secondary text-sm">{{ $answer->answers->min_size }}<sub>(kb)</sub> | </span>
            <label class="font-weight-bold">@lang('filetype: ')</label>
            <span class="text-secondary  text-sm">{{ $answer->answers->file_type }}</span>
            
            <input type="file" name="answer-{{ $question->id }}" class="form-control">

            <input type="submit" value="{{ __('save') }}" class="btn btn-primary mt-3 " />
            </form>
            
        </div>
   
    </div>

</div>