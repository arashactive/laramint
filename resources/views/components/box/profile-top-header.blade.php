<div class="row">

    <div class="col-4">
        <x-box.profile-box :user="$user"/>
    </div>

    <div class="col-8">

        <div class="card shadow mb-4 border-bottom-danger">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold ">
                    <i class="fa fa-comment"></i>
                    {{ __('Messages & Alerts') }}

                </h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                @livewire('services.mentors.comments',[
                'activable_id' => $activable_id,
                'activable_type' => $activable_type,
                'userId' => $user->id
                ])
            </div>
        </div>

    </div>
</div>