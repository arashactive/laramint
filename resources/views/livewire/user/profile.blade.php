<div class="row">

    <div class="col-12">
        <div class="card shadow mb-4 border-bottom-primary">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">{{ __("Profile") }}</h6>

            </div>
            <!-- Card Body -->
            <div class="card-body">

                <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                            <label for="name">{{ __("Name") }}</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" disabled>
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="form-group">
                            <label for="email">{{ __("Email") }}</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" disabled>
                        </div>
                    </div>

                </div>


            </div>
        </div>
    </div>
</div>