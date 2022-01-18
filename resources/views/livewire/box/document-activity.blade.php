<div>
    <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                        {{ __("Document")}} 
                    </div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                        <a data-toggle="modal" data-target="#document" class="btn btn-primary btn-sm" >Attach</a>
                        
                    </div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-question-circle fa-2x text-primary"></i>
                </div>
            </div>
        </div>
    </div>
</div>



<div class="modal fade" id="document" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Document to Session</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true close-btn">×</span>
                </button>
            </div>
           <div class="modal-body">
               
                @forelse ($documents as $document)
                
                
                <x-box.item  
                :title="$document->title"
                :color="$document->color">
                @slot('add')
                {{ route('addDocumentToSession' , [
                    'session' => $session,
                    'active_id' => $document->id
                ]) }}   
                @endslot

               
                </x-container.File>
                
                @empty
                    
                @endforelse
            

            {{ $documents->links() }}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">Close</button>
                
            </div>
        </div>
    </div>
</div>