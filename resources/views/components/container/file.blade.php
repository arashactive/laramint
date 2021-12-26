
<div class="row">
    <div class="col-12 mb-4">
        <div class="card {{ $add ?  'bg-dark' : 'bg-primary'}} text-white shadow">
            <div class="card-body text-left">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-uppercase mb-1">
                            {{  $file->description }}
                        </div>
                        <div class="mb-0 text-white-50 small">{{ __('Size: ') }} {{ (int)($file->file_size / 1000) . 'kb' }}</div>
                    </div>
                    <div class="col-auto">
                        
                        @if($delete)
                            @can('document.order')
                                @if(!$first)
                                <a href="{{ route('changeOrderFile' , ['from' => $file->pivot->id , 'move' => 'up' ]) }}" 
                                    class="btn btn-circle btn-light">
                                <i class="fas fa-sort-up text-dark-300"></i>
                                </a>
                                @endif


                                @if(!$last)
                                <a href="{{ route('changeOrderFile' , ['from' => $file->pivot->id , 'move' => 'down' ]) }}"
                                    class="btn btn-circle btn-light">
                                <i class="fas fa-sort-down text-dark-300"></i>
                                </a>
                                @endif
                            @endcan
                        @endif

                        <a class="btn btn-circle btn-light">
                            <i class="fas fa-file text-dark-300"></i>
                        </a>

                        @if($delete)
                        <a href="{{ $delete }}" class="btn btn-circle btn-danger">
                            <i class="fas fa-times text-dark-300"></i>
                        </a>
                        @endif
                        @if($add) 
                        <a href="{{ $add }}"
                            class="btn btn-circle btn-success">
                            <i class="fas fa-plus text-dark-300"></i>
                        </a>
                        @endif
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>