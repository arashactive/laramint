<div class="m-1">
    <a href="#" class="btn btn-danger btn-sm btn-circle" data-toggle="modal"  data-target="#DeleteModal-{{ $itemId }}">
        <span class="fa fa-trash"></span>
    </a>
</div>

 <x-DeleteModal itemId="{{ $itemId }}"/> 