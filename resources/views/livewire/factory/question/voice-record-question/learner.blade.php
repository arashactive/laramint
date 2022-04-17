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

            <div class="row">
                
                
                @forelse($answer->answers as $index => $answer)
                <div class="col-3">
                    <label class="form-check-label" for="reviewAnswer{{ $index }}">
                        {{ $index. ': ' .$answer .'"' }}
                    </label>
                </div>
                @empty 
                @endforelse
            </div>
           
            </form>
        </div>
   
    </div>

</div>