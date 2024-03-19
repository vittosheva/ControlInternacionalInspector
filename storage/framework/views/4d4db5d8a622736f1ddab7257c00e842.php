<!doctype html>
<html lang="es">
<head>
    <base href="https://insp.controlinternacional.test/">
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
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
        .page-break { page-break-after: always; }
    </style>
</head>
<body>
    <div class="w-full">
        <table class="table">
            <thead class="thead">
                <tr>
                    <th class="thead-th-upper" colspan="10">
                        <img src="<?php echo e(asset('img/control-internacional-logo-print.png')); ?>" alt="" style="height:36px;">
                    </th>
                    <th class="thead-th-upper" colspan="3">
                        <img src="<?php echo e(asset('img/servicio-acreditacion-ecuatoriano.png')); ?>" alt="" style="height:36px;float:right;">
                    </th>
                </tr>
                <tr>
                    <td class="tbody-td !bg-white" colspan="3"><?php echo $inspectionSettings[1] ?? ''; ?></td>
                    <td class="tbody-td !bg-white" colspan="7"><?php echo $inspectionSettings[2] ?? ''; ?></td>
                    <td class="tbody-td !bg-white" colspan="3"><?php echo $inspectionSettings[3] ?? ''; ?></td>
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
                    <td class="tbody-td !bg-white !font-normal"><?php echo e($record->station->code ?? '-'); ?></td>
                    <td class="tbody-td !bg-white !font-normal"><?php echo e($record->company->marketer ?? '-'); ?></td>
                    <td class="tbody-td !bg-white !font-normal" colspan="2"><?php echo e($record->inspection_date->format('Y-m-d') ?? '-'); ?></td>
                    <td class="tbody-td !bg-white !font-normal"><?php echo e($record->price_extra ?? '-'); ?></td>
                    <td class="tbody-td !bg-white !font-normal"><?php echo e($record->price_super ?? '-'); ?></td>
                    <td class="tbody-td !bg-white !font-normal"><?php echo e($record->price_diesel_2 ?? '-'); ?></td>
                    <td class="tbody-td !bg-white !font-normal"><?php echo e($record->price_eco_plus ?? '-'); ?></td>
                    <td class="tbody-td !bg-white !font-normal"><?php echo e(\Jenssegers\Date\Date::parse('01-'.$record->month.'-'.$record->year)->format('F') ?? '-'); ?></td>
                    <td class="tbody-td !bg-white !font-normal"><?php echo e($record->year ?? '-'); ?></td>
                    <td class="tbody-td !bg-white !font-normal" colspan="2"><?php echo e($record->station->location->name ?? '-'); ?></td>
                    <td class="tbody-td !bg-white !font-normal"><?php echo e($record->station->name ?? '-'); ?></td>
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
                <?php $__currentLoopData = $record->details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td class="tbody-td"><?php echo e($item->hose->name); ?></td>
                    <td class="tbody-td"><?php echo e($item->seal_found); ?></td>
                    <td class="tbody-td"><?php echo e($item->seal_left); ?></td>
                    <td class="tbody-td"><?php echo e($item->hose->type->code ?? '-'); ?></td>
                    <td class="tbody-td"><?php echo e($item->hose->color ?? '-'); ?></td>
                    <td class="tbody-td"><?php echo e($item->quantity); ?></td>
                    <td class="tbody-td"><?php echo e($item->octane ?? '-'); ?></td>
                    <td class="tbody-td"><?php echo e('0.0'); ?></td>
                    <td class="tbody-td"><?php echo e($item->observation->name ?? '-'); ?></td>
                    <td class="tbody-td"><?php echo e($item->totalizator ?? '-'); ?></td>
                    <td class="tbody-td"><?php echo e($item->measurement->name ?? '-'); ?></td>
                    <td class="tbody-td"><?php echo e($item->measurements_array ?? '-'); ?></td>
                    <td class="tbody-td"><?php echo e($item->observationCompany->name ?? '-'); ?></td>
                    <?php if(empty($item->observation->name) || $item->observation->name == '') { $badHoses = $badHoses + 1; } ?>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td class="tbody-td-thin" colspan="13">
                        <div class="inline-flex"><?php echo $inspectionSettings[10] ?? ''; ?></div> <span class="px-2 !font-bold"><?php echo e($badHoses); ?></span> <div class="inline-flex"><?php echo $inspectionSettings[11] ?? ''; ?></div> Serafin COD: <span class="px-2 !font-bold"><?php echo e($record->serafin_code ?? ''); ?></span>
                    </td>
                </tr>
                <tr>
                    <td class="tbody-td-thin" colspan="8">
                        <span class="inline-flex"><?php echo $inspectionSettings[12] ?? ''; ?></span>
                        <span class="px-4">SI</span> <span class="checkmark"><?php echo $record->allowed_to_place_calibration_seals === 1 ? $checkMark : ''; ?></span>
                        <span class="px-4">NO</span> <span class="checkmark"><?php echo $record->allowed_to_place_calibration_seals === 0 ? $checkMark : ''; ?></span>
                        <span class="px-4">N/A</span> <span class="checkmark"><?php echo $record->allowed_to_place_calibration_seals === null ? $checkMark : ''; ?></span>
                    </td>
                    <td class="tbody-td-thin" colspan="5">
                        <span class="inline-flex"><?php echo $inspectionSettings[12] ?? ''; ?></span>
                        <span class="px-4">CIE</span> <span class="checkmark"><?php echo $record->responsible_for_calibration_letter === 'CIE' ? $checkMark : ''; ?></span>
                        <span class="px-4">Control P</span> <span class="checkmark"><?php echo $record->responsible_for_calibration_letter === 'Control P' ? $checkMark : ''; ?></span>
                        <span class="px-4">E/S</span> <span class="checkmark"><?php echo $record->responsible_for_calibration_letter === 'E/S' ? $checkMark : ''; ?></span>
                    </td>
                </tr>
                <tr>
                    <td colspan="13">
                        <div class="w-full grid grid-rows-6 grid-cols-12 grid-flow-col gap-0 -m-0.5">
                            <div class="row-span-4 p-0 col-span-4">
                                <div class="thead-th-inner !border-t-0 !border-r-0 !text-[5pt]">Inspección de servicios complementarios</div>
                                <div class="w-full h-[calc(100%_-_12px)] grid grid-cols-12 gap-0">
                                    <?php $__empty_1 = true; $__currentLoopData = $complementaryServices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $controlRecordService): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <div class="col-span-2 tbody-td-thin-tiny !border-t-0 !border-r-0 !text-center super-center"><?php echo e($loop->iteration); ?></div>
                                        <div class="col-span-3 tbody-td-thin-tiny !border-t-0 !border-r-0 !text-center super-center">
                                            <?php echo ($record->complementaryServices->firstWhere('complementary_services_id', '=', $key)->complete ?? 0) == 1 ? $checkMark : $wrongMark; ?>

                                        </div>
                                        <div class="col-span-7 tbody-td-thin-tiny !border-t-0 !border-r-0 super-center !justify-start"><?php echo e($controlRecordService); ?></div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="row-span-2 p-0 col-span-4">
                                <div class="thead-th-inner !border-t-0- !border-r-0 !text-[5pt]">Personas presentes en la inspección</div>
                                <div class="w-full h-[calc(100%_-_14px)] grid grid-cols-12 gap-0">
                                    <div class="col-span-5 tbody-td-thin-tiny !border-t-0 !border-r-0 !text-center !p-0">
                                        <?php if(! empty($record->creator->name) && ! empty($record->additionalInspector->name)): ?>
                                        <div class="grid grid-cols-1 grid-rows-2 gap-0 h-full">
                                            <div class="col-span-1 row-span-1 h-full super-center border-b border-black"><?php echo e($record->creator->name); ?></div>
                                            <div class="col-span-1 row-span-1 h-full super-center"><?php echo e($record->additionalInspector->name); ?></div>
                                        </div>
                                        <?php elseif(! empty($record->creator->name) && empty($record->additionalInspector->name)): ?>
                                        <div class="grid grid-cols-1 grid-rows-1 gap-0 h-full">
                                            <div class="col-span-1 row-span-1 h-full flex items-center justify-center"><?php echo e($record->creator->name); ?></div>
                                        </div>
                                        <?php endif; ?>
                                    </div>
                                    <div class="col-span-7 tbody-td !border-t-0 !border-r-0 !font-bold uppercase super-center"><?php echo e(config('app.name')); ?></div>
                                    <div class="col-span-5 tbody-td-thin !border-t-0 !border-r-0 !text-center super-center"><?php echo e($record->station->station_manager_name ?? null); ?></div>
                                    <div class="col-span-7 tbody-td !border-t-0 !border-r-0 !font-bold uppercase super-center"><?php if(! empty($record->station->name)): ?> <?php echo e('E-S "'.$record->station->name.'"'); ?> <?php endif; ?></div>
                                </div>
                            </div>
                            <div class="row-span-3 p-0 col-span-2">
                                <div class="thead-th-inner !border-t-0 !border-r-0 !text-[5pt]">MEDIDAS DE TANQUES</div>
                                <div class="w-full h-[calc(100%_-_12px)] grid grid-cols-12 gap-0">
                                    <div class="col-span-3 tbody-td !border-0 !border-b !border-l"></div>
                                    <div class="col-span-5 tbody-td-thin !text-center !border-t-0 !border-r-0 super-center">PRODUCTO</div>
                                    <div class="col-span-4 tbody-td-thin !text-center !border-t-0 !border-r-0 super-center">AGUA</div>
                                    <?php $__currentLoopData = $record->measurementTanks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $measurementTank): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="col-span-3 tbody-td-thin !text-center !border-0 !border-b !border-l super-center"><?php echo e($measurementTank->oil); ?></div>
                                        <div class="col-span-5 tbody-td !border-t-0 !border-r-0 super-center"><?php echo e($measurementTank->product); ?>c&#13221;</div>
                                        <div class="col-span-4 tbody-td !border-t-0 !border-r-0 super-center"><?php echo e($measurementTank->water); ?>c&#13221;</div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                            <div class="row-span-2 p-0 col-span-2">
                                <div class="tbody-td !border-t-0 !border-r-0">MEDIDAS SACADAS</div>
                                <div class="w-full h-[calc(100%_-_12px)] grid grid-cols-12 gap-0">
                                    <?php $__currentLoopData = $record->measurementDrawOuts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $measurementDrawOut): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="col-span-3 tbody-td-thin !border-0 !border-b !border-l super-center"><?php echo e($measurementDrawOut->oil); ?></div>
                                        <div class="col-span-9 tbody-td-thin !border-0 !border-b !border-l super-center"><?php echo e($measurementDrawOut->gallons); ?>gal</div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                            <div class="row-span-1 p-0 col-span-8">
                                <div class="w-full h-full grid grid-cols-7 gap-0">
                                    <div class="col-span-1 tbody-td-thin !border-t-0 !border-r-0 !border-l super-center"><?php echo $inspectionSettings[4] ?? ''; ?></div>
                                    <div class="col-span-2 tbody-td-thin !border-t-0 !border-r-0 uppercase super-center">ELABORADO:&nbsp;<span class="!lowercase"><?php echo e(\Jenssegers\Date\Date::now()->format('F d \d\e\l Y')); ?></span></div>
                                    <div class="col-span-1 tbody-td-thin !border-t-0 !border-r-0 super-center"><?php echo $inspectionSettings[5] ?? ''; ?></div>
                                    <div class="col-span-3 tbody-td-thin !border-t-0 super-center !text-center"><?php echo $inspectionSettings[6] ?? ''; ?></div>
                                </div>
                            </div>
                            <div class="row-span-3 p-0 col-span-3">
                                <div class="thead-th-inner !border-t-0 !border-r-0 !text-[5pt]">Observaciones ambientales</div>
                                <div class="w-full h-[calc(100%_-_12px)] grid grid-cols-12 gap-0">
                                    <?php $__empty_1 = true; $__currentLoopData = $environmentalObservations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $environmentalObservation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <div class="col-span-6 tbody-td-thin-tiny !border-t-0 !border-r-0 super-center !justify-start"><?php echo e($environmentalObservation); ?></div>
                                        <div class="col-span-6 tbody-td-thin-tiny !border-t-0 !border-r-0 !text-center super-center">
                                            <?php echo ($record->environmentalObservations->firstWhere('environmental_observations_id', '=', $key)->complete ?? 0) == 1 ? $checkMark : $wrongMark; ?>

                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="row-span-2 p-0 col-span-3">
                                <div class="tbody-td !border-t-0 !border-r-0 !text-left">OBSERVACIONES ADICIONALES:</div>
                                <div class="w-full h-[calc(100%_-_12px)] tbody-td !border-t-0 !border-r-0 underline underline-offset-2 !text-left leading-6 grid justify-items-stretch"><?php echo $record->inspector_notes ?? ''; ?></div>
                            </div>
                            <div class="row-span-3 p-0 col-span-3">
                                <div class="thead-th-inner !border-t-0 !text-[5pt]">Observaciones cumplimiento baños</div>
                                <div class="w-full h-[calc(100%_-_12px)] grid grid-cols-12 gap-0">
                                    <div class="col-span-5 tbody-td-thin-tiny !text-center !border-t-0 !border-r-0 super-center !justify-start">ÍTEMS A INSPECCIONAR</div>
                                    <div class="col-span-2 tbody-td-thin-tiny !text-center !border-t-0 !border-r-0 super-center">Hombres</div>
                                    <div class="col-span-2 tbody-td-thin-tiny !text-center !border-t-0 !border-r-0 super-center">Mujeres</div>
                                    <div class="col-span-3 tbody-td-thin-tiny !text-center !border-t-0 super-center">Discapacitados</div>
                                    <?php $__empty_1 = true; $__currentLoopData = $bathroomComplianceObservations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $bathroomComplianceObservation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <?php $bathroom = $record->bathroomComplianceObservations->firstWhere('bathroom_compliance_observations_id', '=', $key); ?>
                                        <div class="col-span-5 tbody-td-thin-tiny !border-t-0 !border-r-0 super-center !justify-start"><?php echo e($bathroomComplianceObservation); ?></div>
                                        <div class="col-span-2 tbody-td-thin-tiny !border-t-0 !border-r-0 !text-center super-center"><?php echo ($bathroom->men ?? 0) == 1 ? $checkMark : $wrongMark; ?></div>
                                        <div class="col-span-2 tbody-td-thin-tiny !border-t-0 !border-r-0 !text-center super-center"><?php echo ($bathroom->women ?? 0) == 1 ? $checkMark : $wrongMark; ?></div>
                                        <div class="col-span-3 tbody-td-thin-tiny !border-t-0 !text-center super-center"><?php echo ($bathroom->disability_person ?? 0) == 1 ? $checkMark : $wrongMark; ?></div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="row-span-2 p-0 col-span-3">
                                <div class="w-full h-full grid grid-rows-6 grid-cols-12 gap-0 grid-flow-col">
                                    <div class="row-span-4 col-span-5 tbody-td !border-t-0 !border-r-0 super-center">
                                        <?php if(! empty($record->creator->signature)): ?>
                                            <img src="<?php echo $record->creator->signature; ?>" alt="">
                                        <?php else: ?>
                                            &nbsp;
                                        <?php endif; ?>
                                    </div>
                                    <div class="row-span-2 col-span-5 tbody-td !border-t-0 !border-r-0 super-center !text-center">POR <?php echo e($record->company->name ?? '-'); ?></div>
                                    <div class="row-span-4 col-span-7 tbody-td !border-t-0 super-center">
                                        <?php if(! empty($record->station->station_manager_signature)): ?>
                                            <img src="<?php echo $record->station->station_manager_signature; ?>" alt="">
                                        <?php else: ?>
                                            &nbsp;
                                        <?php endif; ?>
                                    </div>
                                    <div class="row-span-2 col-span-7 tbody-td !border-t-0 super-center !text-center">POR ESTACIÓN DE SERVICIO</div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
        <div class="footer-text"><?php echo $inspectionSettings[7] ?? ''; ?></div>
    </div>
</body>
</html>
<?php /**PATH /var/www/Clients/ControlInternacionalInspector/resources/views/pdf/inspection.blade.php ENDPATH**/ ?>