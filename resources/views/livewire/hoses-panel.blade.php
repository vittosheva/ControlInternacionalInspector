<div>
    <div x-data="">
        <div class="grid gap-8 gap-y-2 text-sm grid-cols-1 lg:grid-cols-10">
            <div class="lg:col-span-2 text-gray-600 space-y-4">
                <x-filament::fieldset class="bg-slate-100">
                    <x-slot name="label">Mangueras disponibles:</x-slot>
                    @if (! empty($dataCollection))
                        <p class="mb-4">Mangueras inspeccionadas: {{ $dataCollection->count() }}/{{ $hoses->count() }}</p>
                    @endif
                    <div class="h-[22rem] overflow-y-scroll">
                        <div class="p-1 pr-3">
                            <ul class="fi-sidebar-group-items flex flex-col gap-y-2">
                                @if (! empty($hoses))
                                    @foreach ($hoses->sortBy('name') as $hose)
                                        <li class="fi-sidebar-item">
                                            <x-filament::button
                                                wire:click.prevent="openHoseInfo({{ $hose->id }})"
                                                id="{{ $hose->id }}"
                                                class="!justify-start w-full"
                                                :color="in_array($hose->name, $dataCollection->keys()->toArray()) ? \Filament\Support\Colors\Color::Emerald : 'gray'"
                                                :badge-color="\Filament\Support\Colors\Color::Emerald"
                                            >
                                                @if (in_array($hose->name, $dataCollection->keys()->toArray()))
                                                <x-slot name="badge">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-4 h-4">
                                                        <path fill-rule="evenodd" d="M12.416 3.376a.75.75 0 0 1 .208 1.04l-5 7.5a.75.75 0 0 1-1.154.114l-3-3a.75.75 0 0 1 1.06-1.06l2.353 2.353 4.493-6.74a.75.75 0 0 1 1.04-.207Z" clip-rule="evenodd" />
                                                    </svg>
                                                </x-slot>
                                                @endif
                                                <x-filament::loading-indicator wire:loading wire:target="openHoseData({{ $hose->id }})" class="h-5 w-5" /> {{ $loop->iteration }}.- {{ $hose->name }}
                                            </x-filament::button>
                                        </li>
                                    @endforeach
                                @else
                                    <li class="fi-sidebar-item text-center"> - Ninguna - </li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </x-filament::fieldset>
            </div>

            <div class="lg:col-span-8">
                <x-filament::fieldset>
                    <x-slot name="label">Manguera seleccionada:</x-slot>
                    {{ $this->form }}
                    <div class="w-full mx-auto text-center">
                        <x-filament::button
                            wire:click.prevent="addControl"
                            size="sm"
                            class="mt-3"
                            :color="\Filament\Support\Colors\Color::Emerald"
                            :disabled="empty($selectedHose)"
                        >Guardar inspección</x-filament::button>
                    </div>
                </x-filament::fieldset>
            </div>
        </div>

        <x-filament-actions::modals/>
    </div>
</div>
