<div class="p-6">

    <div class="flex item-center justify-end px-4 py-3 text-right sm:px-6">
        <x-jet-button wire:click="showModalCreateMember">{{ __('Create Member') }}</x-jet-button>
    </div>


    <div class="bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 p-4" role="alert">
        <p class="font-bold">Be Warned</p>
        <p>Something not ideal might be happening.</p>
    </div>

    <div class="flex items-center bg-blue-500 text-white text-sm font-bold px-4 py-3" role="alert">
        <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z"/></svg>
        <p>Something happened that you should know about.</p>
    </div>

    <!-- Cretae New Members -->
    <x-jet-dialog-modal wire:model="modalFormVisible">
        <x-slot name="title">
            {{ __('Create New Member') }}
        </x-slot>

        <x-slot name="content">

            <div>
                <x-jet-label for="name" value="{{ __('Name') }}"/>
                <x-jet-input id="name" class="block mt-1 w-full" type="text" wire:model="name" :value="old('name')"
                             required autofocus autocomplete="name"/>
                @error('name') <span class="error">{{ $message }}</span> @enderror
            </div>

            <div class="mt-4">
                <x-jet-label for="email" value="{{ __('Email') }}"/>
                <x-jet-input id="email" class="block mt-1 w-full" type="email" wire:model="email" :value="old('email')"
                             required/>
                @error('email') <span class="error">{{ $message }}</span> @enderror
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}"/>
                <x-jet-input id="password" class="block mt-1 w-full" type="password" wire:model="password" required
                             autocomplete="new-password"/>
                @error('password') <span class="error">{{ $message }}</span> @enderror
            </div>

            <div class="mt-4">
                <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}"/>
                <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password"
                             wire:model="password_confirmation" required autocomplete="new-password"/>
                @error('password_confirmation') <span class="error">{{ $message }}</span> @enderror
            </div>

        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('modalFormVisible', false)" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>

            <x-jet-button class="ml-2" wire:click="createUser" wire:loading.attr="disabled">
                {{ __('Save') }}
            </x-jet-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>
