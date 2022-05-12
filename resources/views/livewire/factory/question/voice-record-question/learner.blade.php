<div id="question-{{ $question->id }}" class="question col-12 text-left mt-4 p-4">

    <div class="card shadow p-2">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{ $question->title }}</h6>
        </div>
        <div class="card-body">
            
            <form class="workout_questions" 
                id="question_{{ $question->id }}" 
                method="post" action="{{ route("quizWorkout") }}" 
                enctype="multipart/form-data">

                <input type="hidden" id="csrf_{{ $question->id }}" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" id="question_id_{{ $question->id }}" value="{{ $question->id }}" name="question_id">
                <input type="hidden" id="workout_id_{{ $question->id }}" value="{{ $workout->id }}" name="workout_id">
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

                <div class="row mt-4">
                    <div class="col">
                        <a class="btn btn-primary small" id="record">
                            <i class="bi bi-mic-fill"></i>
                            @lang("record live")
                        </a>
                        
                        <a style="display: none;" onclick="saveButton('{{ $question->id }}')" class="btn btn-danger small" id="save">
                            <i class="bi bi-cloud-arrow-up-fill"></i>
                            @lang("stop and save")
                        </a>
                    </div>
                </div>
                <hr/>
                
                <div class="row">
                        <div class="col-5">
                            <audio src=""
                                    controls id="audio"></audio>
                        </div>

                        <div class="col-4">
                            <canvas id="level" height="50" width="250"></canvas>
                        </div>

                        <div class="col-3">
                            <span class="btn btn-outline-secondary small" id="CountUpMin">00m</span>:
                            <span class="btn btn-outline-secondary small" id="CountUpSec">00s</span>
                        </div>
                </div>
                        
              
           
                <input type="submit" value="{{ __('save') }}" class="btn btn-primary mt-3  d-none" />
            </form>
        </div>
   
    </div>

</div>


