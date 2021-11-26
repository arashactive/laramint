<div class="py-12">


    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <div class="p-6">
                
                <x-jet-button wire:click="createShowModel">
                    {{ __('CREATE NEW DEPARTMENT') }}
                </x-jet-button>
                
                {{-- The data table --}}
                <div class="flex flex-col">
                    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">

                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead>
                                        <tr>
                                            <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">#</th>
                                            <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Name</th>
                                            <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Description</th>
                                            <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider"></th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        @if ($departments->count())
                                            @foreach ($departments as $department)
                                                <tr>
                                                    <td class="px-6 py-4 text-sm whitespace-no-wrap">
                                                        {{ $loop->iteration }}</td>
                                                    <td class="px-6 py-4 text-sm whitespace-no-wrap">
                                                        {{ $department->name }}</td>
                                                    <td class="px-6 py-4 text-sm whitespace-no-wrap">
                                                        {{ $department->description }}
                                                    </td>
                                                    
                                                    <td class="px-6 py-4 text-right text-sm">
                                                        <x-jet-button wire:click="updateShowModal({{ $department->id }})">
                                                            {{ __('Update') }}
                                                        </x-jet-button>
                                                        <x-jet-danger-button wire:click="deleteShowModal({{ $department->id }})">
                                                            {{ __('Delete') }}
                                                        </x-jet-button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td class="px-6 py-4 text-sm whitespace-no-wrap" colspan="4">No Results Found</td>
                                            </tr>
                                        @endif
                                    
                                    </tbody>
                                </table>


                            </div>
                        </div>
                    </div>
                </div>

                <br/>
                {{ $departments->links() }}


                <!-- Token Value Modal -->
                <x-jet-dialog-modal wire:model="modelFormVisible">
                    <x-slot name="title">
                        {{ __('Create New Department Form') }}
                    </x-slot>

                    <x-slot name="content">
                        <div class="mt-4">
                            <x-jet-label for="name" value="{{ __('Name') }}" />
                            <x-jet-input id="name" class="block mt-1 w-full" type="text" wire:model.debounce.800ms="name" />
                            @error('name') <span class="error">{{ $message }}</span> @enderror
                        </div>

                        <div class="mt-4">
                            <x-jet-label for="desc" value="{{ __('Desc') }}" />
                            <x-jet-input id="desc" class="block mt-1 w-full" type="text" wire:model.debounce.800ms="description" />
                            @error('desc') <span class="error">{{ $message }}</span> @enderror
                        </div>
                    </x-slot>

                    <x-slot name="footer">
                        <x-jet-secondary-button wire:click="$set('modelFormVisible', false)" wire:loading.attr="disabled">
                            {{ __('Close') }}
                        </x-jet-secondary-button>

                        @if ($modelId)
                        <x-jet-button class="ml-2" wire:click="update" wire:loading.attr="disabled">
                            {{ __('Update') }}
                        </x-jet-danger-button>
                    @else
                        <x-jet-button class="ml-2" wire:click="create" wire:loading.attr="disabled">
                            {{ __('Create') }}
                        </x-jet-danger-button>
                    @endif
                    </x-slot>
                </x-jet-dialog-modal>



                {{-- The Delete Modal --}}

                <x-jet-dialog-modal wire:model="modalConfirmDeleteVisible">
                    <x-slot name="title">
                        {{ __('Delete Page') }}
                    </x-slot>

                    <x-slot name="content">
                        {{ __('Are you sure you want to delete this department? Once the department is deleted, all of its resources and data will be permanently deleted.') }}
                    </x-slot>

                    <x-slot name="footer">
                        <x-jet-secondary-button wire:click="$toggle('modalConfirmDeleteVisible')" wire:loading.attr="disabled">
                            {{ __('Nevermind') }}
                        </x-jet-secondary-button>

                        <x-jet-danger-button class="ml-2" wire:click="delete" wire:loading.attr="disabled">
                            {{ __('Delete Page') }}
                        </x-jet-danger-button>
                    </x-slot>
                </x-jet-dialog-modal>
            </div>
        </div>
    </div>
</div>