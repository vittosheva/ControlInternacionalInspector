<div>
    <div x-data="">
        <div class="grid gap-8 gap-y-2 text-sm grid-cols-1 lg:grid-cols-10">
            <div class="col-span-full">
                <x-filament::fieldset>
                    <x-slot name="label">Detalle de inspecciones:</x-slot>

                    <div class="mx-auto px-4">
                        <!-- Start coding here -->
                        <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
                            <div class="overflow-x-auto">
                                <table class="w-full text-sm text-left text-gray-700 dark:text-gray-400">
                                    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                                        <tr>
                                            <th scope="col" class="px-4 py-3">#</th>
                                            <th scope="col" class="px-4 py-3">Manguera</th>
                                            <th scope="col" class="px-4 py-3">Sello encontrado</th>
                                            <th scope="col" class="px-4 py-3">Sello dejado</th>
                                            <th scope="col" class="px-4 py-3">Cantidad</th>
                                            <th scope="col" class="px-4 py-3">Octanaje</th>
                                            <th scope="col" class="px-4 py-3">Observación</th>
                                            <th scope="col" class="px-4 py-3">Totalizador</th>
                                            <th scope="col" class="px-4 py-3">Medida anterior</th>
                                            <th scope="col" class="px-4 py-3">Medida actual</th>
                                            <th scope="col" class="px-4 py-3">Observación E/S</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($record->details as $item)
                                        <tr class="border-b dark:border-gray-700">
                                            <td class="px-4 py-3">{{ $loop->iteration }}</td>
                                            <td class="px-4 py-3">{{ $item->hose->name }}</td>
                                            <td class="px-4 py-3 text-center">{{ $item->seal_found }}</td>
                                            <td class="px-4 py-3 text-center">{{ $item->seal_left }}</td>
                                            <td class="px-4 py-3 text-right">{{ $item->quantity }}</td>
                                            <td class="px-4 py-3 text-right">{{ $item->octane ?? '-' }}</td>
                                            <td class="px-4 py-3">{{ $item->observation->name ?? '-' }}</td>
                                            <td class="px-4 py-3 text-right">{{ $item->totalizator ?? '-' }}</td>
                                            <td class="px-4 py-3 text-center">{{ $item->measurement->name ?? '-' }}</td>
                                            <td class="px-4 py-3 text-center">{{ $item->measurement2->name ?? '-' }}</td>
                                            <td class="px-4 py-3">{{ $item->observationCompany->name ?? '-' }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </x-filament::fieldset>
            </div>
        </div>
    </div>
</div>
