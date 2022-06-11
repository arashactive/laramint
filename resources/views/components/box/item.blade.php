<div>
    <div class="row">
        <div class="col-12 mb-2">
            <div class="card border-left-{{ $color ?? 'primary' }} bg-light shadow">
                <div class="card-body p-2 text-left">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-uppercase mb-1">
                                {{  $title }}
                            </div>
                            {{ $slot }}
                        </div>
                        <div class="col-auto">


                            @if(isset($up) && $up)
                            <a href="{{ $up }}" 
                                class="btn btn-circle btn-sm btn-secondary">
                            <i class="fas fa-sort-up text-dark-300"></i>
                            </a>
                            @endif

                            @if(isset($down) && $down)
                            <a href="{{ $down }}"
                                class="btn btn-circle btn-sm btn-secondary">
                            <i class="fas fa-sort-down text-dark-300"></i>
                            </a>
                            @endif

                            @if(isset($add) && $add)
                            <a href="{{ $add }}"
                                class="btn btn-circle btn-sm btn-success">
                                <i class="fas fa-plus text-dark-300"></i>
                            </a>
                            @endif

                            @if(isset($delete) && $delete)
                            <a href="{{ $delete }}" class="btn btn-circle btn-sm btn-danger">
                                <i class="fas fa-times text-dark-300"></i>
                            </a>
                            @endif

                            @if(isset($show) && $show)
                            <a class="btn btn-circle btn-sm btn-light">
                                <i class="fas fa-file text-dark-300"></i>
                            </a>
                            @endif

                            @if(isset($ButtonLiveWire) && $ButtonLiveWire)
                                {{ $ButtonLiveWire }}
                            @endif

                        </div>
                    </div>
    
                </div>
            </div>
        </div>
    </div>
</div>