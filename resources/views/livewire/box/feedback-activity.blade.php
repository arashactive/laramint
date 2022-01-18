<div>
    <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                        {{ __("Feedback")}} 
                    </div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                        <a data-toggle="modal" data-target="#feedback" class="btn btn-success btn-sm" >Attach</a>
                        
                    </div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-question-circle fa-2x text-success"></i>
                </div>
            </div>
        </div>
    </div>
</div>



<div class="modal fade" id="feedback" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="feedback">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add feedback to session </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true close-btn">×</span>
                </button>
            </div>
           <div class="modal-body">
               
                @forelse ($feedbacks as $feedback)
                
                    <x-box.item  
                    :title="$feedback->title"
                    :color="$feedback->color">
                    @slot('add')
                    {{ route('addFeedbackToSession' , [
                        'session' => $session,
                        'active_id' => $feedback->id
                    ]) }}   
                    @endslot
                    </x-container.File>
                
                @empty                    
                @endforelse
        
            {{ $feedbacks->links() }}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>