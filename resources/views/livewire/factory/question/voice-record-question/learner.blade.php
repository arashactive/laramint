<div id="question-{{ $question->id }}" class="question col-12 text-left mt-4 p-4">

    <div class="card shadow p-2">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{ $question->title }}</h6>
        </div>
        <div class="card-body">
            <form class="workout_questions" id="question-{{ $question->id }}" method="post" action="{{ route("quizWorkout") }}">
                @csrf
            <p>
                {{ $question->question_body }}
            </p>

            @forelse($answer->answers as $index => $answer)
                <div id="question-{{ $question->id }}" class="p2">
                <div class="form-check">
                    <input name="answer" class="form-check-input" type="radio" id="reviewAnswer{{ $index }}">
                    <label class="form-check-label" for="reviewAnswer{{ $index }}">
                        {{ $answer }}
                    </label>
                </div>
                </div>
            @empty 
            @endforelse
            </form>
        </div>
   
    </div>

</div>