<div>
    <div class="card border-left-info shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                        {{ __("rubric")}} 
                    </div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                        <a data-toggle="modal" data-target="#rubric" class="btn btn-info btn-sm" >Attach</a>
                        
                    </div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-question-circle fa-2x text-info"></i>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="rubric" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="rubric">
        <div class="modal-content">
            
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add rubric to Session</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true close-btn">×</span>
                </button>
            </div>
            
            <div class="modal-body">
               
                @forelse ($rubrics as $rubric)
                
                    <x-box.item  
                    :title="$rubric->title"
                    :color="$rubric->color">
                    @slot('add')
                    {{ route('addRubricToSession' , [
                        'session' => $session,
                        'active_id' => $rubric->id
                    ]) }}   
                    @endslot
                    </x-container.File>

                @empty     
                @endforelse
            
                {{ $rubrics->links() }}

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">Close</button>
                
            </div>
        </div>
    </div>
</div>