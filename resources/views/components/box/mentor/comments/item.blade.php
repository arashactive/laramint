<div>
    <div class="row">
        <div class="col-12 mb-2">
            <div class="card border-left-{{ $comment->confirm ? 'primary' : 'secondary' }} bg-light shadow">
                <div class="card-body p-2 text-left">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-uppercase mb-1">
                                {{ Str::words($comment->body, 3) }}
                            </div>
                            {{ $slot }}
                        </div>
                        <div class="col-auto">

                            @can('mentor.list')
                            <a href="#" class="btn btn-danger btn-round btn-sm">
                                <i class="fa fa-times fa-sm"></i>
                            </a>
                            @endcan
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>