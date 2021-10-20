<div class="p-6 mt-5">

    <div class="mb-3">
        <x-jet-button wire:click="createShowModal">
            {{ __('Create') }}
        </x-jet-button>
    </div>

    {{-- The data table --}}
    <table class="min-w-full divide-y divide-gray-200">
        <thead>
            <tr>
                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Title</th>
                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Slug</th>
                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Content</th>
                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Action</th>
            </tr>
        </thead>

        <tbody class="bg-white divide-y divide-gray-200">
            @if($data->count())
                @foreach ($data as $item)
                    <tr>
                        <td class="px-6 py-4 text-sm whitespace-no-wrap">{{ $item->title }}</td>
                        <td class="px-6 py-4 text-sm whitespace-no-wrap">{{$item->slug}}</td>
                        <td class="px-6 py-4 text-sm whitespace-no-wrap">{{ $item->content }}</td>
                        <td class="px-6 py-4 text-sm whitespace-no-wrap">
                            <x-jet-button wire:click="updateShowModal({{ $item->id }})">
                                {{ __('Edit') }}
                            </x-jet-button>
                            <x-jet-danger-button wire:click="deleteShowModal({{ $item->id }})">
                                {{ __('Delete') }}
                            </x-jet-danger-button>
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
    <br><br>

        {{-- Modal Form --}}
        <x-jet-dialog-modal wire:model="modalFormVisible">
            <x-slot name="title">
                {{ __('Save Page') }}
            </x-slot>
    
            <x-slot name="content">
    
                <div class="mt-4">
                    <x-jet-label for="title" value="{{ __('Title') }}" />
                    <x-jet-input id="title" class="block mt-1 w-full" type="text" wire:model.debounce.800ms="title" />
                    @error('title')
                        <span class="error">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
    
                <div class="mt-4">
                    <x-jet-label for="slug" value="{{ __('Slug') }}" />
                    <div class="mt-1 flex rounded-md shadow-sm">
                        <span class="inline-flex items-center px-3 rounded-1-md border-r-0 border-gray-300 bg-gray-50 text-gray-500 text-sm">
                            http://127.0.0.1:8000
                        </span>
                        <input wire:model="slug" class="form-input flex-1 block w-full rounded-none rounded-r-md transition duration-150 ease-in-out sm:text-sm sm:leading-5" placeholder="url-slug">
                    </div>
                    @error('slug')
                        <span class="error">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
    
                <div class="mt-4">
                    <x-jet-label for="content" value="{{ __('Content') }}" />
                    <div class="rounded-md shadow-sm">
                        <div class="mt-1 bg-white">
                            <div class="body-content" wire:ignore>
                                <trix-editor
                                    class="trix-content"
                                    x-ref="trix"
                                    wire:model.debounce.100000ms="content"
                                    wire:key="trix-content-unique-key"
                                ></trix-editor>
                            </div>
                        </div>
                    </div>
                    @error('content')
                        <span class="error">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
    
            </x-slot>
    
            <x-slot name="footer">
                <x-jet-secondary-button wire:click="$toggle('modalFormVisible')" wire:loading.attr="disabled">
                    {{ __('Cancel') }}
                </x-jet-secondary-button>
    
                @if ($modelId)
                    <x-jet-danger-button class="ml-2" wire:click="update" wire:loading.attr="disabled">
                        {{ __('Edit') }}
                    </x-jet-danger-button>
                @else
                    <x-jet-danger-button class="ml-2" wire:click="create" wire:loading.attr="disabled">
                        {{ __('Create') }}
                    </x-jet-danger-button>
                @endif
            </x-slot>
        </x-jet-dialog-modal>


    {{-- Delete Modal --}}
    <x-jet-dialog-modal wire:model="modalConfirmDeleteVisible">
        <x-slot name="title">
            {{ __('Delete Account') }}
        </x-slot>

        <x-slot name="content">
            {{ __('Are you sure you want to delete this page? Once your page, all of its resources and data will be permanently deleted.') }}
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('modalConfirmDeleteVisible')" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>

            <x-jet-danger-button class="ml-2" wire:click="delete" wire:loading.attr="disabled">
                {{ __('Delete Account') }}
            </x-jet-danger-button>
        </x-slot>
    </x-jet-dialog-modal>

</div>
