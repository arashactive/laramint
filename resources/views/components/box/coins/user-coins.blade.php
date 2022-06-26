<div class="mb-1">
    <div class="card bg-info shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-white text-uppercase mb-1">
                        {{ $user->badge->title }}
                    </div>
                    <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                            <div class="h5 mb-0 mr-3 font-weight-bold text-white-800">
                                0%
                            </div>
                        </div>
                        <div class="col">
                            <div class="progress progress-sm mr-2">
                                <div class="progress-bar bg-warning" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-step-forward fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>


    <div class="card bg-warning text-white shadow mt-1">
        <div class="card-body">
            <h6>{{ __('Coins') }}</h6>
            <div class="row">

                <div class="col">
                    <h3 class="text-white">{{ $user->coins }}</h3>
                </div>
                <div class="col-auto">
                    <i class="fa fa-coins fa-2x text-gray-300"></i>
                </div>
            </div>

        </div>
    </div>

    <div class="card bg-success text-white shadow mt-1">
        <div class="card-body">
            <h6>{{ __('Coins') }}</h6>
            <div class="row">

                <div class="col">
                    <h3 class="text-white">{{ $user->coins }}</h3>
                </div>
                <div class="col-auto">
                    <i class="fa fa-coins fa-2x text-gray-300"></i>
                </div>
            </div>

        </div>
    </div>




    
</div>