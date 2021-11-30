<div class="py-12">


    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <div class="p-6">
                <h1>{{ __("Courses") }}</h1>
                <div class="flex items-center justify-end px-4 py-3 text-right sm:px-6">
                    <x-jet-button wire:click="createShowModel">
                        {{ __('CREATE NEW Coruse') }}
                    </x-jet-button>
                </div>

                {{-- The data table --}}
                <div class="flex flex-col">
                    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">

                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead>
                                        <tr>
                                            <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">#</th>
                                            <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">{{ __("Name") }}</th>
                                            <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">{{ __("Department") }}</th>
                                            <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">{{ __("Description") }}</th>
                                            <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider"></th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        @if ($courses->count())
                                            @foreach ($courses as $course)
                                                <tr>
                                                    <td class="px-6 py-4 text-sm whitespace-no-wrap">
                                                        {{ $loop->iteration }}</td>
                                                    <td class="px-6 py-4 text-sm whitespace-no-wrap">
                                                        {{ $course->name }}</td>

                                                    <td class="px-6 py-4 text-sm whitespace-no-wrap">
                                                        {{ $course->Department->name }}
                                                    </td>
                                                    <td class="px-6 py-4 text-sm whitespace-no-wrap">
                                                        {{ $course->description }}
                                                    </td>
                                                    
                                                    
                                                    <td class="px-6 py-4 text-right text-sm">
                                                        <div class="inline-flex" role="group" aria-label="Button group">
                                                            
                                                            <x-jet-button 
                                                                class="h-8 px-4 m-2 text-sm text-green-100 transition-colors duration-150 bg-green-800	 rounded-lg focus:shadow-outline hover:bg-green-600"
                                                                wire:click="updateShowModal({{ $course->id }})">
                                                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                                            </x-jet-button>
                                                            <x-jet-danger-button
                                                            class="h-8 px-4 m-2 text-sm text-Pink-100 transition-colors duration-150 bg-Pink-200	 rounded-lg focus:shadow-outline hover:bg-Pink-800"
                                                                wire:click="deleteShowModal({{ $course->id }})">
                                                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                                            </x-jet-button>

                                                        </div>
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
                
                {{ $courses->links() }}


                <!-- Token Value Modal -->
                <x-jet-dialog-modal wire:model="modelFormVisible">
                    <x-slot name="title">
                        {{ __('Create New course Form') }}
                    </x-slot>

                    <x-slot name="content">
                        <div class="mt-4">
                            <x-jet-label for="name" value="{{ __('Name') }}" />
                            <x-jet-input id="name" class="block mt-1 w-full" type="text" wire:model.debounce.800ms="name" />
                            @error('name') <span class="error">{{ $message }}</span> @enderror
                        </div>

                        <div class="mt-4">
                            <x-jet-label for="department_id" value="{{ __('Department') }}" />
                            <x-jet-input id="department_id" class="block mt-1 w-full" type="text" wire:model.debounce.800ms="department_id" />
                            @error('department_id') <span class="error">{{ $message }}</span> @enderror
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
                        {{ __('Are you sure you want to delete this course? Once the department is deleted, all of its resources and data will be permanently deleted.') }}
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