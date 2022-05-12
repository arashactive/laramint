<div id="question-{{ $question->id }}" class="question col-12 text-left mt-4 p-4">

    <div class="card shadow p-2">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{ $question->title }}</h6>
        </div>
        <div class="card-body">
            <form class="workout_questions" id="question-{{ $question->id }}" method="post" action="{{ route("quizWorkout") }}">
                @csrf
                      
                <input type="hidden" value="{{ $question->id }}" name="question_id">
                <input type="hidden" value="{{ $workout->id }}" name="workout_id">
            <p>
                {{ $question->question_body }}
            </p>


            @forelse($answer->answers as $index => $answer)
                <div class=" p-2">
                <div class="form-check">
                    <input name="answer-{{ $question->id }}[{{ $loop->iteration - 1 }}]" class="form-check-input" type="checkbox"  id="reviewAnswerMultiChoice{{ $question->id. $index }}">
                    <label class="form-check-label" for="reviewAnswerMultiChoice{{ $question->id.  $index }}">
                        {{ $answer }}
                    </label>
                </div>
                </div>
            @empty 
            @endforelse

            <input type="submit" value="{{ __('save') }}" class="btn btn-primary mt-3  d-none" />
            </form>
        </div>
   
    </div>

</div>