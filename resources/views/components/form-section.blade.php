@props(['submit'])

<div {{ $attributes->merge(['class' => 'md:grid md:grid-cols-2 md:gap-6']) }} style="margin: 0 5px;">
       <div class="mt-5 md:mt-0 md:col-span-2">
        <form wire:submit.prevent="{{ $submit }}">
            <div class="px-4 py-5 bg-white sm:p-6 shadow {{ isset($actions) ? 'sm:rounded-tl-md sm:rounded-tr-md' : 'sm:rounded-md' }}">
                <x-section-title>
                    <x-slot name="title">{{ $title }}</x-slot>
                    <x-slot name="description">{{ $description }}</x-slot>
                </x-section-title>
                <div class="grid grid-cols-6 gap-6" style="margin: 0 25px;">
                    {{ $form }}
                </div>
            </div>

            @if (isset($actions))
                <div class="flex items-center justify-end px-4 py-3 text-right shadow bg-gray-50 sm:px-6 sm:rounded-bl-md sm:rounded-br-md">
                    {{ $actions }}
                </div>
            @endif
        </form>
    </div>
</div>
