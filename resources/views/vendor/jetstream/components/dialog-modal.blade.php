@props(['id' => null, 'maxWidth' => null])

<x-jet-modal class="m-10" :id="$id" :maxWidth="$maxWidth" {{ $attributes }}>
    <div class="px-6 py-10 mt-10">
        <div class="text-lg">
            {{ $title }}
        </div>

        <div class="mt-4">
            {{ $content }}
        </div>
    </div>

    <div class="px-6 py-4 bg-gray-100 text-right">
        {{ $footer }}
    </div>
</x-jet-modal>
