@if($title)
<div class="col-12 mt-4 mb-2">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{ $title }}</h6>
        </div>
        <div class="card-body">
            
            <h6>{{ $question_body }}</h2>

            <p>
                
                @if(isset($workout) && $workout->WorkOutQuiz->where('question_id', $question->id)->first()->answer != '')
                <textarea class="form-control">{{ $workout->WorkOutQuiz->where('question_id', $question->id)->first()->answer }}</textarea>     
                @endif
            
            </p>
        </div>
    </div>

</div>
@endif