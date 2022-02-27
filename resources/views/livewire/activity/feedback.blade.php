<div>
    <div class="process-wrap active-step1">
        <div class="row">
                
            @forelse ($activity->Questions as $question)
                    
            <div class="col-2 ">
                <div class="process-step-cont">
                <button wire:click="showQuestion('{{ $question->id }}')" class="process-step"></button >
                <span class="process-label">Question {{ $loop->iteration }}</span>
                </div>
            </div>
            
            
            @empty  
            @endforelse
        
        
        </div>
        <hr/>
        <div class="row">
            <div class="col-12 p-4 text-center">
            {!! $questionsRender !!}
            </div>
        </div>
    </div>

  

</div>