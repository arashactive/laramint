@if($title)
<div class="col-12 mt-4 mb-2">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{ $title }}</h6>
        </div>
        <div class="card-body">
            
            <h2>{{ $question_body }}</h2>

            @forelse($answers as $index => $answer)
                <div class=" p-2 {{ 'answer-' . $index == $correctAnswer[$index] ? " bg-gradient-success text-white" : '' }}">
                <div class="form-check">
                    <input name="answer[]" {{  'answer-'. $index ==  $correctAnswer[$index] ? 'checked' : ''}} class="form-check-input" type="checkbox"  id="reviewAnswer{{ $index }}">
                    <label class="form-check-label" for="reviewAnswer{{ $index }}">
                        {{ $answer }}
                    </label>
                </div>
                </div>
            @empty 
            @endforelse
        </div>
    </div>

</div>
@endif