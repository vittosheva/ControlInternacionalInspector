<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inspecciones</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style type="text/tailwindcss">
        @layer utilities {
            * { @apply text-[5.5pt] text-black leading-tight; }
            .table { @apply w-full; }
            .thead { @apply uppercase font-bold bg-zinc-300; }
            .thead-th { @apply px-3 py-1 border border-black text-center; }
            .tbody-td { @apply px-3 py-0.5 border border-black text-center; }
            .thead-th-inner { @apply px-3 py-1 border border-black text-center font-bold uppercase bg-zinc-300; }
            .thead-th-upper { @apply px-3 py-0.5 border-0 text-center mx-auto !bg-white; }
            .tbody-td-thin { @apply px-3 py-0.5 border border-black text-left text-[5pt]; }
            .tbody-td-thin * { @apply !text-[4.5pt]; }
            .tbody-td-thin-underline { @apply px-3 py-0.5 border border-black text-left text-[4.5pt] uppercase underline; }
            .tbody-td-thin-tiny { @apply px-3 py-0.5 border border-black text-left text-[3.5pt]; }
            .checkmark { @apply text-slate-800 text-[5.5pt]; }
            .footer-text, .footer-text > * { @apply !text-[4.5pt]; }
            .no-br > * { @apply !p-0 !m-0; }
            .super-center { @apply flex items-center justify-center; }
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
                <tr>
                    <td class="tbody-td !bg-white !font-normal">{{ $record->station->code ?? '-' }}</td>
                    <td class="tbody-td !bg-white !font-normal">{{ $record->company->marketer ?? '-' }}</td>
                    <td class="tbody-td !bg-white !font-normal" colspan="2">{{ $record->inspection_date->format('Y-m-d') ?? '-' }}</td>
                    <td class="tbody-td !bg-white !font-normal">{{ $record->price_extra ?? '-' }}</td>
                    <td class="tbody-td !bg-white !font-normal">{{ $record->price_super ?? '-' }}</td>
                    <td class="tbody-td !bg-white !font-normal">{{ $record->price_diesel_2 ?? '-' }}</td>
                    <td class="tbody-td !bg-white !font-normal">{{ $record->price_eco_plus ?? '-' }}</td>
                    <td class="tbody-td !bg-white !font-normal">{{ \Jenssegers\Date\Date::parse('01-'.$record->month.'-'.$record->year)->format('F') ?? '-' }}</td>
                    <td class="tbody-td !bg-white !font-normal">{{ $record->year ?? '-' }}</td>
                    <td class="tbody-td !bg-white !font-normal" colspan="2">{{ $record->station->location->name ?? '-' }}</td>
                    <td class="tbody-td !bg-white !font-normal">{{ $record->station->name ?? '-' }}</td>
                </tr>
            </thead>
            <tbody>
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
                    <td class="tbody-td">{{ $item->measurements_array ?? '-' }}</td>
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
                        <span class="inline-flex">{!! $inspectionSettings[12] ?? '' !!}</span>
                        <span class="px-4">SI</span> <span class="checkmark">{!! $record->allowed_to_place_calibration_seals === 1 ? $checkMark : '' !!}</span>
                        <span class="px-4">NO</span> <span class="checkmark">{!! $record->allowed_to_place_calibration_seals === 0 ? $checkMark : '' !!}</span>
                        <span class="px-4">N/A</span> <span class="checkmark">{!! $record->allowed_to_place_calibration_seals === null ? $checkMark : '' !!}</span>
                    </td>
                    <td class="tbody-td-thin" colspan="5">
                        <span class="inline-flex">{!! $inspectionSettings[12] ?? '' !!}</span>
                        <span class="px-4">CIE</span> <span class="checkmark">{!! $record->responsible_for_calibration_letter === 'CIE' ? $checkMark : '' !!}</span>
                        <span class="px-4">Control P</span> <span class="checkmark">{!! $record->responsible_for_calibration_letter === 'Control P' ? $checkMark : '' !!}</span>
                        <span class="px-4">E/S</span> <span class="checkmark">{!! $record->responsible_for_calibration_letter === 'E/S' ? $checkMark : '' !!}</span>
                    </td>
                </tr>
                <tr>
                    <td colspan="13">
                        <div class="w-full grid grid-rows-6 grid-cols-12 grid-flow-col gap-0 -m-0.5">
                            <div class="row-span-4 p-0 col-span-4">
                                <div class="thead-th-inner !border-t-0 !border-r-0 !text-[5pt]">Inspección de servicios complementarios</div>
                                <div class="w-full h-[calc(100%_-_12px)] grid grid-cols-12 gap-0">
                                    @forelse ($complementaryServices as $key => $controlRecordService)
                                        <div class="col-span-2 tbody-td-thin-tiny !border-t-0 !border-r-0 !text-center super-center">{{ $loop->iteration }}</div>
                                        <div class="col-span-3 tbody-td-thin-tiny !border-t-0 !border-r-0 !text-center super-center">
                                            {!! ($record->complementaryServices->firstWhere('complementary_services_id', '=', $key)->complete ?? 0) == 1 ? $checkMark : $wrongMark !!}
                                        </div>
                                        <div class="col-span-7 tbody-td-thin-tiny !border-t-0 !border-r-0 super-center !justify-start">{{ $controlRecordService }}</div>
                                    @empty
                                    @endforelse
                                </div>
                            </div>
                            <div class="row-span-2 p-0 col-span-4">
                                <div class="thead-th-inner !border-t-0- !border-r-0 !text-[5pt]">Personas presentes en la inspección</div>
                                <div class="w-full h-[calc(100%_-_14px)] grid grid-cols-12 gap-0">
                                    <div class="col-span-5 tbody-td-thin-tiny !border-t-0 !border-r-0 !text-center !p-0">
                                        @if (! empty($record->creator->name) && ! empty($record->additionalInspector->name))
                                        <div class="grid grid-cols-1 grid-rows-2 gap-0 h-full">
                                            <div class="col-span-1 row-span-1 h-full super-center border-b border-black">{{ $record->creator->name }}</div>
                                            <div class="col-span-1 row-span-1 h-full super-center">{{ $record->additionalInspector->name }}</div>
                                        </div>
                                        @elseif (! empty($record->creator->name) && empty($record->additionalInspector->name))
                                        <div class="grid grid-cols-1 grid-rows-1 gap-0 h-full">
                                            <div class="col-span-1 row-span-1 h-full flex items-center justify-center">{{ $record->creator->name }}</div>
                                        </div>
                                        @endif
                                    </div>
                                    <div class="col-span-7 tbody-td !border-t-0 !border-r-0 !font-bold uppercase super-center">{{ config('app.name') }}</div>
                                    <div class="col-span-5 tbody-td-thin !border-t-0 !border-r-0 !text-center super-center">{{ $record->station->station_manager_name ?? null }}</div>
                                    <div class="col-span-7 tbody-td !border-t-0 !border-r-0 !font-bold uppercase super-center">@if (! empty($record->station->name)) {{ 'E-S "'.$record->station->name.'"' }} @endif</div>
                                </div>
                            </div>
                            <div class="row-span-3 p-0 col-span-2">
                                <div class="thead-th-inner !border-t-0 !border-r-0 !text-[5pt]">MEDIDAS DE TANQUES</div>
                                <div class="w-full h-[calc(100%_-_12px)] grid grid-cols-12 gap-0">
                                    <div class="col-span-3 tbody-td !border-0 !border-b !border-l"></div>
                                    <div class="col-span-5 tbody-td-thin !text-center !border-t-0 !border-r-0 super-center">PRODUCTO</div>
                                    <div class="col-span-4 tbody-td-thin !text-center !border-t-0 !border-r-0 super-center">AGUA</div>
                                    @foreach($record->measurementTanks as $measurementTank)
                                        <div class="col-span-3 tbody-td-thin !text-center !border-0 !border-b !border-l super-center">{{ $measurementTank->oil }}</div>
                                        <div class="col-span-5 tbody-td !border-t-0 !border-r-0 super-center">{{ $measurementTank->product }}c&#13221;</div>
                                        <div class="col-span-4 tbody-td !border-t-0 !border-r-0 super-center">{{ $measurementTank->water }}c&#13221;</div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="row-span-2 p-0 col-span-2">
                                <div class="tbody-td !border-t-0 !border-r-0">MEDIDAS SACADAS</div>
                                <div class="w-full h-[calc(100%_-_12px)] grid grid-cols-12 gap-0">
                                    @foreach($record->measurementDrawOuts as $measurementDrawOut)
                                        <div class="col-span-3 tbody-td-thin !border-0 !border-b !border-l super-center">{{ $measurementDrawOut->oil }}</div>
                                        <div class="col-span-9 tbody-td-thin !border-0 !border-b !border-l super-center">{{ $measurementDrawOut->gallons }}gal</div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="row-span-1 p-0 col-span-8">
                                <div class="w-full h-full grid grid-cols-7 gap-0">
                                    <div class="col-span-1 tbody-td-thin !border-t-0 !border-r-0 !border-l super-center">{!! $inspectionSettings[4] ?? '' !!}</div>
                                    <div class="col-span-2 tbody-td-thin !border-t-0 !border-r-0 uppercase super-center">ELABORADO:&nbsp;<span class="!lowercase">{{ \Jenssegers\Date\Date::now()->format('F d \d\e\l Y') }}</span></div>
                                    <div class="col-span-1 tbody-td-thin !border-t-0 !border-r-0 super-center">{!! $inspectionSettings[5] ?? '' !!}</div>
                                    <div class="col-span-3 tbody-td-thin !border-t-0 super-center !text-center">{!! $inspectionSettings[6] ?? '' !!}</div>
                                </div>
                            </div>
                            <div class="row-span-3 p-0 col-span-3">
                                <div class="thead-th-inner !border-t-0 !border-r-0 !text-[5pt]">Observaciones ambientales</div>
                                <div class="w-full h-[calc(100%_-_12px)] grid grid-cols-12 gap-0">
                                    @forelse ($environmentalObservations as $key => $environmentalObservation)
                                        <div class="col-span-6 tbody-td-thin-tiny !border-t-0 !border-r-0 super-center !justify-start">{{ $environmentalObservation }}</div>
                                        <div class="col-span-6 tbody-td-thin-tiny !border-t-0 !border-r-0 !text-center super-center">
                                            {!! ($record->environmentalObservations->firstWhere('environmental_observations_id', '=', $key)->complete ?? 0) == 1 ? $checkMark : $wrongMark !!}
                                        </div>
                                    @empty
                                    @endforelse
                                </div>
                            </div>
                            <div class="row-span-2 p-0 col-span-3">
                                <div class="tbody-td !border-t-0 !border-r-0 !text-left">OBSERVACIONES ADICIONALES:</div>
                                <div class="w-full h-[calc(100%_-_12px)] tbody-td !border-t-0 !border-r-0 underline underline-offset-2 !text-left leading-6 grid justify-items-stretch">{!! $record->inspector_notes ?? '' !!}</div>
                            </div>
                            <div class="row-span-3 p-0 col-span-3">
                                <div class="thead-th-inner !border-t-0 !text-[5pt]">Observaciones cumplimiento baños</div>
                                <div class="w-full h-[calc(100%_-_12px)] grid grid-cols-12 gap-0">
                                    <div class="col-span-5 tbody-td-thin-tiny !text-center !border-t-0 !border-r-0 super-center !justify-start">ÍTEMS A INSPECCIONAR</div>
                                    <div class="col-span-2 tbody-td-thin-tiny !text-center !border-t-0 !border-r-0 super-center">Hombres</div>
                                    <div class="col-span-2 tbody-td-thin-tiny !text-center !border-t-0 !border-r-0 super-center">Mujeres</div>
                                    <div class="col-span-3 tbody-td-thin-tiny !text-center !border-t-0 super-center">Discapacitados</div>
                                    @forelse ($bathroomComplianceObservations as $key => $bathroomComplianceObservation)
                                        @php $bathroom = $record->bathroomComplianceObservations->firstWhere('bathroom_compliance_observations_id', '=', $key); @endphp
                                        <div class="col-span-5 tbody-td-thin-tiny !border-t-0 !border-r-0 super-center !justify-start">{{ $bathroomComplianceObservation }}</div>
                                        <div class="col-span-2 tbody-td-thin-tiny !border-t-0 !border-r-0 !text-center super-center">{!! ($bathroom->men ?? 0) == 1 ? $checkMark : $wrongMark !!}</div>
                                        <div class="col-span-2 tbody-td-thin-tiny !border-t-0 !border-r-0 !text-center super-center">{!! ($bathroom->women ?? 0) == 1 ? $checkMark : $wrongMark !!}</div>
                                        <div class="col-span-3 tbody-td-thin-tiny !border-t-0 !text-center super-center">{!! ($bathroom->disability_person ?? 0) == 1 ? $checkMark : $wrongMark !!}</div>
                                    @empty
                                    @endforelse
                                </div>
                            </div>
                            <div class="row-span-2 p-0 col-span-3">
                                <div class="w-full h-full grid grid-rows-6 grid-cols-12 gap-0 grid-flow-col">
                                    <div class="row-span-4 col-span-5 tbody-td !border-t-0 !border-r-0 super-center">
                                        @if (! empty($record->creator->signature))
                                            <img src="{!! $record->creator->signature !!}" alt="">
                                        @else
                                            &nbsp;
                                        @endif
                                    </div>
                                    <div class="row-span-2 col-span-5 tbody-td !border-t-0 !border-r-0 super-center !text-center">POR {{ $record->company->name ?? '-' }}</div>
                                    <div class="row-span-4 col-span-7 tbody-td !border-t-0 super-center">
                                        @if (! empty($record->station->station_manager_signature))
                                            <img src="{!! $record->station->station_manager_signature !!}" alt="">
                                        @else
                                            &nbsp;
                                        @endif
                                    </div>
                                    <div class="row-span-2 col-span-7 tbody-td !border-t-0 super-center !text-center">POR ESTACIÓN DE SERVICIO</div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
        <div class="footer-text">{!! $inspectionSettings[7] ?? '' !!}</div>
    </div>
</body>
</html>
