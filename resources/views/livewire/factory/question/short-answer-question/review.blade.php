@if($title)
<div class="col-12 mt-4 mb-2">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{ $title }}</h6>
        </div>
        <div class="card-body">
            
            <h2>{{ $question_body }}</h2>

            @forelse($answers as $index => $answer)
                
                <div class=" p-2 {{ $index == $correctAnswer ? " bg-gradient-success text-white" : '' }}">
                <div class="form-check">
                    
                    <label class="form-check-label" for="reviewAnswer{{ $index }}">
                        {{ $answer }}
                    </label>
                    <input name="answer" value="{{ json_decode($workout->WorkOutQuiz->where('question_id', $question->id)->first()->answer) ?? '' }}" class="form-control" type="text" id="reviewAnswer{{ $index }}">
                </div>
                </div>
            @empty 
            @endforelse
        </div>
    </div>

</div>
@endif