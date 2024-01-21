<div>
    <table class="w-full table-auto divide-y divide-gray-200 dark:divide-white/5 bg-white dark:bg-gray-900 text-sm">
        <thead>
        <tr class="p-2 bg-gray-50 dark:bg-gray-800">
            <td></td>
            <td class="p-2 text-center">Hombre</td>
            <td class="p-2 text-center">Mujer</td>
            <td class="p-2 text-center">Discapacitados</td>
        </tr>
        </thead>
        <tbody>
        @foreach ($bathrooms as $id => $bathroom)
            <tr>
                <td class="p-2">{{ $bathroom }}</td>
                <td class="p-2 text-center">
                    <input
                        type="checkbox"
                        wire:key="data.{{ $relationName }}.{{ $id }}.men"
                        wire:model="data.{{ $relationName }}.{{ $id }}.men"
                        wire:click="addBathroomCheck({{ $id }},'men')"
                        class="fi-checkbox-input rounded border-none bg-white shadow-sm ring-1 transition duration-75 checked:ring-0 focus:ring-2 focus:ring-offset-0 disabled:pointer-events-none disabled:bg-gray-50 disabled:text-gray-50 disabled:checked:bg-current disabled:checked:text-gray-400 dark:bg-white/5 dark:disabled:bg-transparent dark:disabled:checked:bg-gray-600"
                    >
                </td>
                <td class="p-2 text-center">
                    <input
                        type="checkbox"
                        wire:key="data.{{ $relationName }}.{{ $id }}.women"
                        wire:model="data.{{ $relationName }}.{{ $id }}.women"
                        wire:click="addBathroomCheck({{ $id }},'women')"
                        class="fi-checkbox-input rounded border-none bg-white shadow-sm ring-1 transition duration-75 checked:ring-0 focus:ring-2 focus:ring-offset-0 disabled:pointer-events-none disabled:bg-gray-50 disabled:text-gray-50 disabled:checked:bg-current disabled:checked:text-gray-400 dark:bg-white/5 dark:disabled:bg-transparent dark:disabled:checked:bg-gray-600"
                    >
                </td>
                <td class="p-2 text-center">
                    <input
                        type="checkbox"
                        wire:key="data.{{ $relationName }}.{{ $id }}.disability_person"
                        wire:model="data.{{ $relationName }}.{{ $id }}.disability_person"
                        wire:click="addBathroomCheck({{ $id }},'disability_person')"
                        class="fi-checkbox-input rounded border-none bg-white shadow-sm ring-1 transition duration-75 checked:ring-0 focus:ring-2 focus:ring-offset-0 disabled:pointer-events-none disabled:bg-gray-50 disabled:text-gray-50 disabled:checked:bg-current disabled:checked:text-gray-400 dark:bg-white/5 dark:disabled:bg-transparent dark:disabled:checked:bg-gray-600"
                    >
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
