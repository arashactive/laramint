<div>
    <div class="process-wrap active-step1">
        <div class="row">
                
            @forelse ($activity->Files as $file)
                    
            <div class="col-1 ">
                <div class="process-step-cont">
                <button wire:click="showFile('{{ $file->id }}')" class="process-step  step-{{ $loop->iteration }}"></button >
                <span class="process-label">F {{ $loop->iteration }}</span>
                </div>
            </div>
            
            
            @empty  
            @endforelse
        
        
        </div>
        <hr/>
        <div class="row">
            <div class="col-12 p-4 text-center">
            {!! $fileRender !!}
            </div>
        </div>
    </div>

  

</div>