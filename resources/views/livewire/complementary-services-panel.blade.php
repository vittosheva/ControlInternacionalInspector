<div>
    {{ $this->form }}

    <div class="w-full text-center">
        <x-filament::button
            wire:click.prevent="addComplementaryServices"
            size="sm"
            class="mt-3"
            :color="\Filament\Support\Colors\Color::Emerald"
        >Confirmar</x-filament::button>
    </div>

    <x-filament-actions::modals />
</div>
