@php $badHoses = 0; @endphp
<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inspecciones</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style type="text/tailwindcss">
        @layer utilities {
            * { @apply text-[6pt] text-black; }
            .table { @apply w-full; }
            .thead { @apply uppercase font-bold bg-zinc-300; }
            .thead-th { @apply px-3 py-1 border border-black text-center; }
            .tbody-td { @apply px-3 py-0.5 border border-black text-center; }
            .thead-th-inner { @apply px-3 py-1 border border-black text-center uppercase bg-zinc-300; }
            .thead-th-upper { @apply px-3 py-0.5 border-0 text-center mx-auto !bg-white; }
            .tbody-td-thin { @apply px-3 py-0.5 border border-black text-left text-[5pt] uppercase; }
            .tbody-td-thin * { @apply !text-[5pt]; }
            .tbody-td-thin-underline { @apply px-3 py-0.5 border border-black text-left text-[5pt] uppercase underline; }
            .tbody-td-thin-tiny { @apply px-3 py-0.5 border border-black text-left text-[4pt] uppercase; }
            .checkmark { @apply text-slate-800 text-[6pt]; }
            .footer-text, .footer-text > * { @apply !text-[5pt]; }
            .no-br > * { @apply !p-0 !m-0; }
        }
    </style>
</head>
<body>
    <div class="w-full">
        <table class="table">
            <thead class="thead">
                <tr>
                    <th class="thead-th-upper" colspan="10">
                        <img src="{{ asset('img/control-internacional-logo-print.png') }}" alt="" style="height:36px;">
                    </th>
                    <th class="thead-th-upper" colspan="3">
                        <img src="{{ asset('img/servicio-acreditacion-ecuatoriano.png') }}" alt="" style="height:36px;float:right;">
                    </th>
                </tr>
                <tr>
                    <td class="tbody-td !bg-white" colspan="3">{!! $inspectionSettings[1] ?? '' !!}</td>
                    <td class="tbody-td !bg-white" colspan="7">{!! $inspectionSettings[2] ?? '' !!}</td>
                    <td class="tbody-td !bg-white" colspan="3">{!! $inspectionSettings[3] ?? '' !!}</td>
                </tr>
                <tr>
                    <th class="thead-th">Centro</th>
                    <th class="thead-th">Comercializadora</th>
                    <th class="thead-th" colspan="2">Fecha inspección/emisión</th>
                    <th class="thead-th">Precio Extra</th>
                    <th class="thead-th">Precio Super</th>
                    <th class="thead-th">Precio Diesel</th>
                    <th class="thead-th">Precio EcoPais</th>
                    <th class="thead-th">Mes</th>
                    <th class="thead-th">Año</th>
                    <th class="thead-th" colspan="2" width="13%">Lugar</th>
                    <th class="thead-th" width="15%">Estación de servicio</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="tbody-td">{{ $record->station->code ?? '-' }}</td>
                    <td class="tbody-td">{{ $record->company->marketer ?? '-' }}</td>
                    <td class="tbody-td" colspan="2">{{ $record->inspection_date->format('Y-m-d') ?? '-' }}</td>
                    <td class="tbody-td">{{ $record->price_extra ?? '-' }}</td>
                    <td class="tbody-td">{{ $record->price_super ?? '-' }}</td>
                    <td class="tbody-td">{{ $record->price_diesel_2 ?? '-' }}</td>
                    <td class="tbody-td">{{ $record->price_eco_plus ?? '-' }}</td>
                    <td class="tbody-td">{{ $record->year ?? '-' }}</td>
                    <td class="tbody-td">{{ $record->month ?? '-' }}</td>
                    <td class="tbody-td" colspan="2">{{ $record->station->location->name ?? '-' }}</td>
                    <td class="tbody-td">{{ $record->station->name ?? '-' }}</td>
                </tr>
                <tr>
                    <th class="thead-th-inner">Manguera</th>
                    <th class="thead-th-inner">Sello encontrado</th>
                    <th class="thead-th-inner">Sello dejado</th>
                    <th class="thead-th-inner">Producto</th>
                    <th class="thead-th-inner">Color</th>
                    <th class="thead-th-inner">Cantidad</th>
                    <th class="thead-th-inner">Octanaje</th>
                    <th class="thead-th-inner">Flash Point</th>
                    <th class="thead-th-inner">Observación ARCERNNR</th>
                    <th class="thead-th-inner">Registro Totalizador</th>
                    <th class="thead-th-inner">Medida anterior</th>
                    <th class="thead-th-inner">Medida actual</th>
                    <th class="thead-th-inner">Observación E/S</th>
                </tr>
                @foreach ($record->details as $item)
                <tr>
                    <td class="tbody-td">{{ $item->hose->name }}</td>
                    <td class="tbody-td">{{ $item->seal_found }}</td>
                    <td class="tbody-td">{{ $item->seal_left }}</td>
                    <td class="tbody-td">{{ $item->hose->type->code ?? '-' }}</td>
                    <td class="tbody-td">{{ $item->hose->color ?? '-' }}</td>
                    <td class="tbody-td">{{ $item->quantity }}</td>
                    <td class="tbody-td">{{ $item->octane ?? '-' }}</td>
                    <td class="tbody-td">{{ '0.0' }}</td>
                    <td class="tbody-td">{{ $item->observation->name ?? '-' }}</td>
                    <td class="tbody-td">{{ $item->totalizator ?? '-' }}</td>
                    <td class="tbody-td">{{ $item->measurement->name ?? '-' }}</td>
                    <td class="tbody-td">{{ $item->measurement2->name ?? '-' }}</td>
                    <td class="tbody-td">{{ $item->observationCompany->name ?? '-' }}</td>
                    @php if(empty($item->observation->name) || $item->observation->name == '') { $badHoses = $badHoses + 1; } @endphp
                </tr>
                @endforeach
                <tr>
                    <td class="tbody-td-thin" colspan="13">
                        <div class="inline-flex">{!! $inspectionSettings[10] ?? '' !!}</div> <span class="px-2 !font-bold">{{ $badHoses }}</span> <div class="inline-flex">{!! $inspectionSettings[11] ?? '' !!}</div> Serafin COD: <span class="px-2 !font-bold">{{ $record->serafin_code ?? '' }}</span>
                    </td>
                </tr>
                <tr>
                    <td class="tbody-td-thin" colspan="8">
                        <div class="inline-flex">{!! $inspectionSettings[12] ?? '' !!}</div> <span class="px-4">SI</span> <span class="checkmark">✓</span> <span class="px-4">NO</span> <span class="px-4">N/A</span>
                    </td>
                    <td class="tbody-td-thin" colspan="5">
                        <div class="inline-flex">{!! $inspectionSettings[13] ?? '' !!}</div> <span class="px-4">CIE</span> <span class="px-4">Control P</span> <span class="checkmark">✓</span> <span class="px-4">E/S</span>
                    </td>
                </tr>




                <tr>
                    <td colspan="13">
                        <div class="w-full grid grid-rows-6 grid-cols-5 grid-flow-col gap-0 -m-0.5">
                            <div class="row-span-4 p-0 col-span-2">
                                <div class="thead-th-inner !border-t-0 !text-[5pt]">Inspección de servicios complementarios</div>
                                <div class="w-full grid grid-cols-12">
                                    @forelse ($record->complementaryServices as $key => $controlRecordService)
                                        <div class="col-span-2 tbody-td-thin-tiny !border-t-0 !border-r-0 !text-center">{{ $loop->iteration }}</div>
                                        <div class="col-span-3 tbody-td-thin-tiny !border-t-0 !border-r-0 !text-center">{{ $controlRecordService->complete == 1 ? '✓' : 'X' }}</div>
                                        <div class="col-span-7 tbody-td-thin-tiny !border-t-0">{{ $controlRecordService?->complementaryService?->description ?? '-' }}</div>
                                    @empty
                                    @endforelse
                                </div>
                            </div>
                            <div class="row-span-2 p-0 col-span-2">
                                <div class="thead-th-inner !border-t-0 !text-[5pt]">Personas presentes en la inspección</div>
                                <div class="w-full grid grid-cols-12">
                                    <div class="col-span-5 tbody-td-thin-tiny !border-t-0 !border-r-0 !text-center">&nbsp;</div>
                                    <div class="col-span-7 tbody-td !border-t-0 !font-bold !text-center uppercase">{{ config('app.name') }}</div>
                                    <div class="col-span-5 tbody-td-thin-tiny !border-t-0 !border-r-0 !text-center">&nbsp;</div>
                                    <div class="col-span-7 tbody-td !border-t-0 !font-bold !text-center uppercase">@if (! empty($record->station->name)) {{ 'E-S "'.$record->station->name.'"' }} @endif</div>
                                </div>
                            </div>
                            <div class="row-span-3 bg-sky-400 p-4 col-span-1">3</div>
                            <div class="row-span-2 bg-slate-400 p-4 col-span-1">4</div>
                            <div class="row-span-1 bg-red-400 p-4 col-span-5">5</div>
                            <div class="row-span-3 bg-yellow-400 p-4 col-span-1">6</div>
                            <div class="row-span-2 bg-fuchsia-400 p-4 col-span-1">7</div>
                            <div class="row-span-3 bg-zinc-400 p-4 col-span-1">8</div>
                            <div class="row-span-2 bg-indigo-400 p-4 col-span-1">9</div>
                        </div>
                    </td>
                </tr>






                <tr class="hidden">
                    <td class="tbody-td-thin !p-0 !border-0 !align-top" colspan="5" rowspan="16">
                        <table class="w-full border-0">
                            <tr>
                                <th class="thead-th-inner !border-t-0 !text-[5pt]" colspan="5">Inspección de servicios complementarios</th>
                            </tr>
                            @forelse ($record->complementaryServices as $key => $controlRecordService)
                                <tr>
                                    <td class="tbody-td-thin-tiny !text-center">{{ $loop->iteration }}</td>
                                    <td class="tbody-td-thin-tiny !text-center">{{ $controlRecordService->complete == 1 ? '✓' : 'X' }}</td>
                                    <td class="tbody-td-thin-tiny" colspan="3">{{ $controlRecordService?->complementaryService?->description ?? '-' }}</td>
                                </tr>
                            @empty
                            @endforelse
                            <tr>
                                <th class="thead-th-inner !border-t-0 !text-[5pt]" colspan="5">Personas presentes en la inspección</th>
                            </tr>
                            <tr>
                                <td class="tbody-td-thin-tiny" colspan="2" style="height:25px;">&nbsp;</td>
                                <td class="tbody-td !font-bold !text-center uppercase" colspan="3">{{ config('app.name') }}</td>
                            </tr>
                            <tr>
                                <td class="tbody-td-thin-tiny" colspan="2" style="height:25px;">&nbsp;</td>
                                <td class="tbody-td !font-bold !text-center uppercase" colspan="3">@if (! empty($record->station->name)) {{ 'E-S "'.$record->station->name.'"' }} @endif</td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <tr class="hidden">
                    <td class="tbody-td-thin !p-0 !border-0 !align-top" colspan="3">
                        <table class="w-full border-0">
                            <tr>
                                <th class="thead-th-inner !border-t-0 !text-[5pt]" colspan="3">Medidas de tanques</th>
                            </tr>
                            @forelse ($record->complementaryServices as $key => $controlRecordService)
                                <tr>
                                    <td class="tbody-td-thin-tiny !text-center">{{ $loop->iteration }}</td>
                                    <td class="tbody-td-thin-tiny !text-center">{{ $controlRecordService->complete == 1 ? '✓' : 'X' }}</td>
                                    <td class="tbody-td-thin-tiny" colspan="3">{{ $controlRecordService?->complementaryService?->description ?? '-' }}</td>
                                </tr>
                            @empty
                            @endforelse
                        </table>
                    </td>
                </tr>

                <tr class="hidden">
                    <td class="tbody-td-thin !p-0 !border-0 !align-top" colspan="2">
                        <table class="w-full border-0">
                            <tr>
                                <th class="thead-th-inner !border-t-0 !text-[5pt]" colspan="2">Observaciones ambientales</th>
                            </tr>
                            @forelse ($record->environmentalObservations as $key => $controlRecordEnvironmental)
                                <tr>
                                    <td class="tbody-td-thin-tiny">{{ $controlRecordEnvironmental?->environmentalObservation?->description ?? '-' }}</td>
                                    <td class="tbody-td-thin-tiny !text-center">{{ $controlRecordEnvironmental->complete == 1 ? '✓' : 'X' }}</td>
                                </tr>
                            @empty
                            @endforelse
                        </table>
                    </td>
                </tr>

                <tr class="hidden">
                    <td class="tbody-td-thin !p-0 !border-0 !align-top" colspan="3">
                        <table class="w-full border-0">
                            <tr>
                                <th class="thead-th-inner !border-t-0 !text-[5pt]" colspan="4">Observaciones cumplimiento baños</th>
                            </tr>
                            @forelse ($record->bathroomComplianceObservations as $key => $controlRecordBathroom)
                                <tr>
                                    <td class="tbody-td-thin-tiny">{{ $controlRecordBathroom?->bathroomComplianceObservation?->description ?? '-' }}</td>
                                    <td class="tbody-td-thin-tiny !text-center">{{ $controlRecordBathroom->men == 1 ? '✓' : 'X' }}</td>
                                    <td class="tbody-td-thin-tiny !text-center">{{ $controlRecordBathroom->women == 1 ? '✓' : 'X' }}</td>
                                    <td class="tbody-td-thin-tiny !text-center">{{ $controlRecordBathroom->disability_person == 1 ? '✓' : 'X' }}</td>
                                </tr>
                            @empty
                            @endforelse
                        </table>
                    </td>
                </tr>

                <tr class="hidden">
                    <td colspan="8" rowspan="2" class="tbody-td-thin-tiny !text-center">
                        hola
                    </td>
                </tr>






                <tr class="hidden">
                    <td colspan="13">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="thead-th-inner !border-t-0 !text-[5pt]" colspan="5">Inspección de servicios complementarios</th>
                                    <th class="thead-th-inner !border-t-0 !text-[5pt]" colspan="3">Medidas de tanques</th>
                                    <th class="thead-th-inner !border-t-0 !text-[5pt]" colspan="2">Observaciones ambientales</th>
                                    <th class="thead-th-inner !border-t-0 !text-[5pt]" colspan="3">Observaciones cumplimiento baños</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="align-top p-0" colspan="5">
                                        {{--<table class="table">
                                            @forelse ($record->complementaryServices as $key => $controlRecordService)
                                                <tr>
                                                    <td class="tbody-td-thin-tiny !text-center">{{ $loop->iteration }}</td>
                                                    <td class="tbody-td-thin-tiny !text-center">{{ $controlRecordService->complete == 1 ? '✓' : 'X' }}</td>
                                                    <td class="tbody-td-thin-tiny" width="60%">{{ $controlRecordService?->complementaryService?->description ?? '-' }}</td>
                                                </tr>
                                            @empty
                                            @endforelse
                                            <tr>
                                                <th class="thead-th-inner !border-t-0 !text-[5pt]" colspan="3">Personas presentes en la inspección</th>
                                            </tr>
                                            <tr>
                                                <td class="tbody-td-thin-tiny" colspan="2" style="height:25px;">&nbsp;</td>
                                                <td class="tbody-td !font-bold !text-center uppercase">{{ config('app.name') }}</td>
                                            </tr>
                                            <tr>
                                                <td class="tbody-td-thin-tiny" colspan="2" style="height:25px;">&nbsp;</td>
                                                <td class="tbody-td !font-bold !text-center uppercase">@if (! empty($record->station->name)) {{ 'E-S "'.$record->station->name.'"' }} @endif</td>
                                            </tr>
                                        </table>--}}
                                    </td>
                                    <td class="align-top p-0" colspan="3">
                                        -
                                        {{-- INFORMACIÓN DE TANQUES --}}
                                    </td>
                                    <td class="align-top p-0" colspan="2">
                                        {{--<table class="table">
                                            @forelse ($record->environmentalObservations as $key => $controlRecordEnvironmental)
                                                <tr>
                                                    <td class="tbody-td-thin-tiny">{{ $controlRecordEnvironmental?->environmentalObservation?->description ?? '-' }}</td>
                                                    <td class="tbody-td-thin-tiny !text-center">{{ $controlRecordEnvironmental->complete == 1 ? '✓' : 'X' }}</td>
                                                </tr>
                                            @empty
                                            @endforelse
                                        </table>--}}
                                    <td class="align-top p-0" colspan="3">
                                        {{--<table class="table">
                                            @forelse ($record->bathroomComplianceObservations as $key => $controlRecordBathroom)
                                                <tr>
                                                    <td class="tbody-td-thin-tiny">{{ $controlRecordBathroom?->bathroomComplianceObservation?->description ?? '-' }}</td>
                                                    <td class="tbody-td-thin-tiny !text-center">{{ $controlRecordBathroom->men == 1 ? '✓' : 'X' }}</td>
                                                    <td class="tbody-td-thin-tiny !text-center">{{ $controlRecordBathroom->women == 1 ? '✓' : 'X' }}</td>
                                                    <td class="tbody-td-thin-tiny !text-center">{{ $controlRecordBathroom->disability_person == 1 ? '✓' : 'X' }}</td>
                                                </tr>
                                            @empty
                                            @endforelse
                                        </table>--}}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>

                {{--
                <tr>
                    <th class="thead-th-inner !text-[5pt]" colspan="5">Personas presentes en la inspección</th>
                </tr>
                <tr>
                    <td colspan="2" class="tbody-td">Douglas Delgado</td>
                    <td colspan="3" rowspan="2" class="tbody-td uppercase">{{ config('app.name') }}</td>
                </tr>
                <tr>
                    <td colspan="2" class="tbody-td">&nbsp;</td>
                </tr>
                <tr>
                    <td colspan="2" class="tbody-td">David Sotomayor</td>
                    <td colspan="3" class="tbody-td uppercase">E-S "{{ $record->station->name ?? '-' }}"</td>
                </tr>
                --}}
            </tbody>
        </table>
        <div class="footer-text">{!! $inspectionSettings[7] ?? '' !!}</div>
    </div>
</body>
</html>
