@if($title)
<div class="col-12 mt-4 mb-2">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{ $title }}</h6>
        </div>
        <div class="card-body">
            
            <h2>{{ $question_body }}</h2>

            
            @if(isset($workout) && $workout->WorkOutQuiz->where('question_id', $question->id)->first()->answer != '')
            <p>Audio:</p>
            <audio src="{{ asset(json_decode($workout->WorkOutQuiz->where('question_id', $question->id)->first()->answer, true)) }}" controls class="form-control"></audio>
            @endif
        </div>
    </div>

</div>
@endif