<div class="col-12 text-left mt-4 p-4">

    <div class="card shadow p-2">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{ $question->title }}</h6>
        </div>
        <div class="card-body">
            
            <p>
                {{ $question->question_body }}
            </p>

            <textarea name="description-{{ $question->id }}" type="text" class="form-control editor"></textarea>
        </div>
   
    </div>

</div>