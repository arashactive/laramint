<div class="card">
    <div class="card-body">



        <div class="form-group row">
            <div class="col">

                <div x-data="{ isUploading: false, progress: 0 }" x-on:livewire-upload-start="isUploading = true" x-on:livewire-upload-finish="isUploading = false" x-on:livewire-upload-error="isUploading = false" x-on:livewire-upload-progress="progress = $event.detail.progress">
                    <input type="file" wire:model="file">

                    <!-- Progress Bar -->
                    <div x-show="isUploading">

                        <div class="progress mt-2">
                            <div class="progress-bar progress-bar-striped" role="progressbar" x-bind:style="`width: ${progress}%`" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        @if($file)
        <div class="form-group row">
            <div class="col-4">
            <x-atoms.file-uploaded-render :file="$file" />
            <input name="file" type="hidden" class="form-control form-control-user" value="{{ $file ?? '' }}">
            </div>

        </div>
        @endif

        @error('file') <span class="alert alert-danger alert-sm">{{ $message }}</span> @enderror


    </div>
</div>