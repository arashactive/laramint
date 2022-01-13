@if($title)
<div class="col-12 mt-4 mb-2">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{ $title }}</h6>
        </div>
        <div class="card-body">
            
            <h2>{{ $question_body }}</h2>

             @forelse($answers as $index => $answer)
                <div class="row pb-2 mt-2 border-bottom">
                    <div class="col-1">
                        <span># {{ $loop->iteration }}</span>
                    </div>
                    <div class="col-5 ">
                        <label class="form-check-label text-info">
                            {{ $answer['left'] }}
                        </label>
                    </div>
                    <div class="col-1">
                        <span class="text-success">
                            <i class="fa fa-arrow-right"></i>
                        </span>
                    </div>
                    <div class="col-5">
                        <label class="form-check-label text-warning">
                            {{ $answer['right'] }}
                        </label>
                    </div>
                        
                    
                </div>
            @empty 
            @endforelse
        </div>
    </div>

</div>
@endif