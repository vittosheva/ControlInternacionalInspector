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
            .tbody-td-thin-underline { @apply px-3 py-0.5 border border-black text-left text-[5pt] uppercase underline; }
            .tbody-td-thin-tiny { @apply px-3 py-0.5 border border-black text-left text-[4pt] uppercase; }
            .checkmark { @apply text-slate-800 text-[6pt]; }
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
                    <td class="tbody-td !bg-white" colspan="3">Reporte de inspección # 1131-219/2023</td>
                    <td class="tbody-td !bg-white" colspan="7">Control de cantidad y calidad en estaciones de servicios</td>
                    <td class="tbody-td !bg-white" colspan="3">Acreditación Nº SAE OI 13-015 inspección</td>
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
                @foreach($record->details as $item)
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
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td class="tbody-td-thin-underline" colspan="13">Declaración de conformidad: durante la inspección se determinó que <span class="px-4">#</span> mangueras cumplen/no cumplen con la NORMA INEN 1781 y el instructivo de control de calidad y cantidad de estaciones de servicios. ICC10: Serafin COD: <span class="px-4">#</span></td>
                </tr>
                <tr>
                    <td class="tbody-td-thin" colspan="8">Se permitió colocar sellos de prevención en mangueras para calibración <span class="px-4">SI</span> <span class="checkmark">✓</span> <span class="px-4">NO</span> <span class="px-4">N/A</span></td>
                    <td class="tbody-td-thin" colspan="5">Responsable de carta de calibración a la ARCH: <span class="px-4">CIE</span> <span class="px-4">Control P</span> <span class="checkmark">✓</span> <span class="px-4">E/S</span></td>
                </tr>
                <tr>
                    <th class="thead-th-inner !text-[5pt]" colspan="5">Inspección de servicios complementarios</th>
                </tr>
                @foreach($record->complementaryServices as $complementaryService)
                <tr>
                    <td class="tbody-td-thin-tiny !text-center">{{ $loop->iteration }}</td>
                    <td class="tbody-td-thin-tiny !text-center">{{ $complementaryService->complete == 1 ? '✓' : 'X' }}</td>
                    <td class="tbody-td-thin-tiny" colspan="3">{{ $complementaryService->complementaryService->description ?? '-' }}</td>
                </tr>
              @endforeach
            </tfoot>
        </table>
        <div class="text-[5pt]">Nota: Las actividades de OCTANAJE, FLASH POINT, MEDIDAS DE TANQUES, OBSERVACIONES AMBIENTALES, MEDIDAS SACADAS, OBSERVACIONES ADICIONALES, OBSERVACIONES CUMPLIMIENTO DE BAÑOS <span class="underline uppercase">NO</span> están incluídas en el alcance de acreditación del Servicio de Acreditación Ecuatoriano (SAE)</div>
    </div>
</body>
</html>


{{--
<th class="thead-th-inner !text-[5pt]" colspan="5">Inspección de servicios complementarios</th>
<th class="thead-th-inner !text-[5pt]" colspan="3">Medidas de tanques</th>
<th class="thead-th-inner !text-[5pt]" colspan="2">Observaciones ambientales</th>
<th class="thead-th-inner !text-[5pt]" colspan="3">Observaciones cumplimiento baños</th>
--}}

{{--
@foreach($record->complementaryServices as $complementaryService)
    <tr>
        <td class="tbody-td-thin-tiny !text-center">{{ $loop->iteration }}</td>
        <td class="tbody-td-thin-tiny !text-center">{{ $complementaryService->complete == 1 ? '✓' : 'X' }}</td>
        <td class="tbody-td-thin-tiny" colspan="3">{{ $complementaryService->complementaryService->description ?? '-' }}</td>
    </tr>
@endforeach
--}}
