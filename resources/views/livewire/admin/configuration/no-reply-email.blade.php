<div class="card shadow mb-4 border-left-danger">
    <!-- Card Header - Dropdown -->
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">{{ __("Email Configuration") }}</h6>
    </div>
    <!-- Card Body -->
    <div class="card-body">
        <div class="row">
            <div class="col-6 p-4">

                <div class="form-group row">
                    <label for="MAIL_MAILER">{{ __('MAIL_MAILER') }}</label>
                    <input wire:model="MAIL_MAILER" wire:change="config_changed" type="text" class="form-control" value="{{ $MAIL_MAILER }}">
                </div>

                <div class="form-group row">
                    <label for="MAIL_HOST">{{ __('MAIL_HOST') }}</label>
                    <input wire:model="MAIL_HOST" wire:change="config_changed" type="text" class="form-control" value="{{ $MAIL_HOST }}">
                </div>


                <div class="form-group row">
                    <label for="MAIL_USERNAME">{{ __('MAIL_USERNAME') }}</label>
                    <input wire:model="MAIL_USERNAME" wire:change="config_changed" type="text" class="form-control" value="{{ $MAIL_USERNAME }}">
                </div>

                <div class="form-group row">
                    <label for="MAIL_PASSWORD">{{ __('MAIL_PASSWORD') }}</label>
                    <input wire:model="MAIL_PASSWORD" wire:change="config_changed" type="password" class="form-control" value="{{ $MAIL_PASSWORD }}">
                </div>
            </div>
            <div class="col-6 p-4">

                <div class="form-group row">
                    <label for="MAIL_PORT">{{ __('MAIL_PORT') }}</label>
                    <input wire:model="MAIL_PORT" wire:change="config_changed" type="text" class="form-control" value="{{ $MAIL_PORT }}">
                </div>

                <div class="form-group row">
                    <label for="MAIL_ENCRYPTION">{{ __('MAIL_ENCRYPTION') }}</label>
                    <input wire:model="MAIL_ENCRYPTION" wire:change="config_changed" type="text" class="form-control" value="{{ $MAIL_ENCRYPTION }}">
                </div>

                <div class="form-group row">
                    <label for="MAIL_FROM_ADDRESS">{{ __('MAIL_FROM_ADDRESS') }}</label>
                    <input wire:model="MAIL_FROM_ADDRESS" wire:change="config_changed" type="text" class="form-control" value="{{ $MAIL_FROM_ADDRESS }}">
                </div>

                <div class="form-group row">
                    <label for="MAIL_FROM_NAME">{{ __('MAIL_FROM_NAME') }}</label>
                    <input wire:model="MAIL_FROM_NAME" wire:change="config_changed" type="text" class="form-control" value="{{ $MAIL_FROM_NAME }}">
                </div>


            </div>

        </div>

        @if (session()->has('message'))

        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong> {{ session('message') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif

    </div>
</div>