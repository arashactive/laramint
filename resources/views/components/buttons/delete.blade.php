<div class="m-1">
    <a class="dropdown-item" data-toggle="modal" data-target="#DeleteModal-{{ $itemId }}">
        <span class="fa fa-trash pr-2"></span>
        @lang('Delete')
    </a>

</div>


<x-DeleteModal itemId="{{ $itemId }}" path="{{ $path }}" />