<div>
    <div x-data="">
        <div class="grid gap-8 gap-y-2 text-sm grid-cols-1 lg:grid-cols-10">
            <div class="col-span-full">
                <?php if (isset($component)) { $__componentOriginal44a508883f9207a939367952373b4021 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal44a508883f9207a939367952373b4021 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'filament::components.fieldset','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('filament::fieldset'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                     <?php $__env->slot('label', null, []); ?> Detalle de inspecciones realizadas: <?php $__env->endSlot(); ?>

                    <div class="mx-auto px-4">
                        <div class="bg-white dark:bg-gray-800 relative sm:rounded-lg overflow-hidden">
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
                                    <?php if(! empty($record->details)): ?>
                                        <?php $__empty_1 = true; $__currentLoopData = $record->details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                            <tr class="border-b dark:border-gray-700">
                                                <td class="px-4 py-3"><?php echo e($loop->iteration); ?></td>
                                                <td class="px-4 py-3"><?php echo e($item->hose->name); ?></td>
                                                <td class="px-4 py-3 text-center"><?php echo e($item->seal_found); ?></td>
                                                <td class="px-4 py-3 text-center"><?php echo e($item->seal_left); ?></td>
                                                <td class="px-4 py-3 text-right"><?php echo e($item->quantity ?? '-'); ?></td>
                                                <td class="px-4 py-3 text-right"><?php echo e($item->octane ?? '-'); ?></td>
                                                <td class="px-4 py-3"><?php echo e($item->observation->name ?? '-'); ?></td>
                                                <td class="px-4 py-3 text-right"><?php echo e($item->totalizator ?? '-'); ?></td>
                                                <td class="px-4 py-3 text-center"><?php echo e($item->measurement->name ?? '-'); ?></td>
                                                <td class="px-4 py-3 text-center"><?php echo e($item->measurements_array ?? '-'); ?></td>
                                                <td class="px-4 py-3"><?php echo e($item->observationCompany->name ?? '-'); ?></td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                            <tr class="border-b dark:border-gray-700">
                                                <td class="px-4 py-3 text-center" colspan="11">No existen registros de inspección</td>
                                            </tr>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal44a508883f9207a939367952373b4021)): ?>
<?php $attributes = $__attributesOriginal44a508883f9207a939367952373b4021; ?>
<?php unset($__attributesOriginal44a508883f9207a939367952373b4021); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal44a508883f9207a939367952373b4021)): ?>
<?php $component = $__componentOriginal44a508883f9207a939367952373b4021; ?>
<?php unset($__componentOriginal44a508883f9207a939367952373b4021); ?>
<?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?php /**PATH /Users/vittoriodormi/Desktop/VITTOSHEVA/GitHub/LARAVEL/Clients/ControlInternacionalInspector/resources/views/livewire/hose-details-panel.blade.php ENDPATH**/ ?>