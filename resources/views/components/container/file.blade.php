
<div class="row">
    <div class="col-12 mb-4">
        <div class="card bg-gradient-info text-white shadow">
            <div class="card-body text-left">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-uppercase mb-1">
                            {{  $file->description }}
                        </div>
                        <div class="mb-0 text-white-50 small">{{ __('Size: ') }} {{ (int)($file->file_size / 1000) . 'kb' }}</div>
                    </div>
                    <div class="col-auto">

                        <a class="btn btn-circle btn-light">
                            <i class="fas fa-file text-dark-300"></i>
                        </a>

                        <a class="btn btn-circle btn-danger">
                            <i class="fas fa-times text-dark-300"></i>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>