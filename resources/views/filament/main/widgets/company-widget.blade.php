@php
    $user = filament()->auth()->user();
@endphp

<x-filament-widgets::widget class="fi-account-widget">
    <x-filament::section>
        <div class="flex flex-row items-center gap-x-3 text-sm py-1">
            <div class="w-full">
                <div class="flex gap-x-3">
                    <div class="block">
                        <div class="font-semibold">{{ __('Company') }}: </div>
                    </div>

                    <div class="flex-1">
                        <div>{{ filament()->getTenant()->getAttributeValue('name') }}</div>
                    </div>
                </div>

                <div class="flex gap-x-3">
                    <div class="block">
                        <div class="font-semibold">{{ __('User') }}: </div>
                    </div>

                    <div class="flex-1">
                        <div>{{ $user->user_id }}</div>
                    </div>
                </div>
            </div>
        </div>
    </x-filament::section>
</x-filament-widgets::widget>
