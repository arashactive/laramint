<div class="card shadow mb-4 border-bottom-info">
    <!-- Card Header - Dropdown -->
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold ">
            <i class="fa fa-user"></i>
            {{ $user->name }}

        </h6>
    </div>
    <!-- Card Body -->
    <div class="card-body">

        <div class="d-flex flex-column align-items-center text-center">
            <img src="{{ URL::to('img/profiles/' . rand(1,12) . '.jpg') }}" alt="{{ $user->name }}" class="rounded" width="150">
            <div class="mt-3 ">
                <p class="text-secondary mb-1"><i class="fa fa-envelope"></i> {{ $user->email }}</p>
                <div class="px-2 rounded mt-4 date "><i class="fa fa-clock"></i> <span class="join">Joined {{ $user->created_at }}</span> </div>
            </div>
        </div>
    </div>
</div>