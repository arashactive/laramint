<div class="m-1">
    <form class="delete-item" action="{{ route($path , $itemId) }}" method="POST">
        @csrf
        @method('delete')
        <button type="submit" class="dropdown-item ">
            <span class="fa fa-trash pr-2"></span>
            @lang('Delete')
        </button>
    </form>


</div>

