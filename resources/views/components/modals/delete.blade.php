<div>     
    <!-- Logout Modal-->
    <div class="modal fade" id="DeleteModal-{{$itemId}}" tabindex="1" role="dialog" aria-labelledby="DeleteModal"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Remove?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Delete" below if you are ready to remove your current item.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a 
                onclick="event.preventDefault(); document.getElementById('delete-form-{{ $itemId }}').submit();"
                class="btn btn-danger" href="delete.html">Delete</a>
            </div>
        </div>
    </div>
    </div>

    
</div>