<div id="btnQuestions" class="row">
        
    @forelse ($activity->Questions as $question)
            
    <div class="col-1 ">
        <button id="btnQuestion-{{ $question->id }}" onclick="showQuestion('{{ $question->id }}')" class="process-step btnQuestion">
            <span class="process-label">{{ $loop->iteration }}</span>
        </button >
    </div>
    
    
    @empty  
    @endforelse


</div>
<hr/>
<div id="questions" style="display: none" class="row">
    <div class="col-12 p-4 text-center">
    {!! $questionsRender !!}
    </div>
</div>



<script>
    var style = "{{ $style }}";
</script>