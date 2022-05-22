<div>
  <a class="dropdown-item" data-toggle="modal" data-target="#exampleModal">
    <i class="fa fa-comment pr-2"></i> @lang('New Comment')
  </a>
  <!-- Button trigger modal -->


  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('mentor-comments.store') }}" method="post">
          <div class="modal-body">
            @csrf
            <input type="hidden" name="user_id" value="{{ $userId }}" />
            <input type="hidden" name="activable_type" value="{{ $activableType }}" />
            <input type="hidden" name="activable_id" value="{{ $activableId }}" />

            <textarea name="body" class="form-control editor" cols="30" rows="10"></textarea>


          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('Close')</button>
            <button type="submit" class="btn btn-primary">@lang('Save')</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>