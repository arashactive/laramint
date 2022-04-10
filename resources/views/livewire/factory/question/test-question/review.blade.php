<div>
@if($title)
    <div class="col-12 mt-4 mb-2 text-small">

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">{{ $title }}</h6>
            </div>
            <div class="card-body">
                
                <h6>{{ $question_body }}</h2>

                @forelse($answers as $index => $answer)
                    
                    @if(isset($workout) && $workout->WorkOutQuiz->where('question_id', $question->id)->first()->answer >= 0)

                    <div class=" p-2 
                    {{ $index == $correctAnswer 
                    ? " border border-success text-success rounded font-weight-bold " : '' }}
                    
                    {{ $index == $workout->WorkOutQuiz->where('question_id', $question->id)->first()->answer  && 
                        $workout->WorkOutQuiz->where('question_id', $question->id)->first()->answer !=  $correctAnswer
                        ? " border border-danger text-danger rounded font-weight-light" : '' }}
                    ">
                        <div class="form-check">
                            <input name="answer" {{ $index == $correctAnswer ? 'checked' : ''}} class="form-check-input" type="radio"  id="reviewAnswer{{ $index }}">
                            <label class="form-check-label" for="reviewAnswer{{ $index }}">
                                {{ $answer }}
                            </label>
                        </div>
                        </div>
                   
                        
                    @else
                    <div class=" p-2 {{ $index == $correctAnswer ? " border border-success rounded font-weight-bold" : '' }}">
                        <div class="form-check">
                            <input name="answer" {{ $index == $correctAnswer ? 'checked' : ''}} class="form-check-input" type="radio"  id="reviewAnswer{{ $index }}">
                            <label class="form-check-label" for="reviewAnswer{{ $index }}">
                                {{ $answer }}
                            </label>
                        </div>
                        </div> 
                    @endif
                    
                @empty 
                @endforelse
            </div>
        </div>

    </div>
@endif

</div>