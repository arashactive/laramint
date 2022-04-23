@if($title)
<div class="col-12 mt-4 mb-2">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{ $title }}</h6>
        </div>
        <div class="card-body">
            
            <h2>{{ $question_body }}</h2>

             @forelse($answers as $index => $answer)
             @if(isset($workout) && $workout->WorkOutQuiz->where('question_id', $question->id)->first()->answer >= 0)
             @php($workoutAnswer = json_decode($workout->WorkOutQuiz->where('question_id', $question->id)->first()->answer, true))
             

                <div class="row pb-2 mt-2 border-bottom 
                {{ !$workoutAnswer[$index]['correct'] ? "border border-danger text-danger rounded font-weight-light" : '' }} ">
                    <div class="col-1">
                        <span># {{ $loop->iteration }}</span>
                    </div>
                    <div class="col-5 ">
                        <label class="form-check-label text-info">
                            {{ $answer->left }}
                        </label>
                    </div>
                    <div class="col-1">
                        <span class="text-success">
                            <i class="fa fa-arrow-right"></i>
                        </span>
                    </div>
                    <div class="col-5">
                        <label class="form-check-label text-warning">
                            @if(!$workoutAnswer[$index]['correct'])
                            <label class="text-success">{{ $answer->right }}</label>
                            @endif
                            <label>{{ $workoutAnswer[$index]['studentAnswer'] }}</label>
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