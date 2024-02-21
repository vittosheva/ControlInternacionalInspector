<?php if (isset($component)) { $__componentOriginal511d4862ff04963c3c16115c05a86a9d = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal511d4862ff04963c3c16115c05a86a9d = $attributes; } ?>
<?php $component = Illuminate\View\DynamicComponent::resolve(['component' => $getFieldWrapperView()] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('dynamic-component'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\DynamicComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['field' => $field]); ?>
    <?php
        $info = collect($getChildComponentContainer()->getLivewire()->data)->except(['items_repeater', 'additional_data'])->toArray();
    ?>
    <div>
        <div class="fi-fo-field-info-values border border-gray-200 shadow-sm rounded-lg overflow-hidden max-w-sm mx-auto">
            <table class="w-full text-sm leading-5">
                <tbody>
                    <tr class="bg-gray-50">
                        <td class="px-3 py-1.5 text-left text-gray-700 font-medium">Subtotal sin impuestos</td>
                        <td class="px-3 py-1.5 text-right text-gray-700"><span class="text-right"><?php echo e($info['gross_subtotal'] ?? zeros()); ?></span></td>
                    </tr>
                    <tr class="bg-white">
                        <td class="px-3 py-1.5 text-left text-gray-700 font-medium">Subtotal 12%</td>
                        <td class="px-3 py-1.5 text-right text-gray-700"><span class="text-right"><?php echo e($info['subtotal_12'] ?? zeros()); ?></span></td>
                    </tr>
                    <tr class="bg-gray-50">
                        <td class="px-3 py-1.5 text-left text-gray-700 font-medium">Subtotal 0%</td>
                        <td class="px-3 py-1.5 text-right text-gray-700"><span class="text-right"><?php echo e($info['subtotal_0'] ?? zeros()); ?></span></td>
                    </tr>
                    <tr class="bg-white">
                        <td class="px-3 py-1.5 text-left text-gray-700 font-medium">Subtotal No objeto impuesto</td>
                        <td class="px-3 py-1.5 text-right text-gray-700"><span class="text-right"><?php echo e($info['subtotal_no_objeto_impuesto'] ?? zeros()); ?></span></td>
                    </tr>
                    <tr class="bg-gray-50">
                        <td class="px-3 py-1.5 text-left text-gray-700 font-medium">Subtotal Exento IVA</td>
                        <td class="px-3 py-1.5 text-right text-gray-700"><span class="text-right"><?php echo e($info['subtotal_excento_iva'] ?? zeros()); ?></span></td>
                    </tr>
                    <tr class="bg-white">
                        <td class="px-3 py-1.5 text-left text-gray-700 font-medium">Total Descuento</td>
                        <td class="px-3 py-1.5 text-right text-gray-700"><span class="text-right"><?php echo e($info['discount_total'] ?? zeros()); ?></span></td>
                    </tr>
                    <tr class="bg-gray-50">
                        <td class="px-3 py-1.5 text-left text-gray-700 font-medium">ICE</td>
                        <td class="px-3 py-1.5 text-right text-gray-700"><span class="text-right"><?php echo e($info['ice_total'] ?? zeros()); ?></span></td>
                    </tr>
                    <tr class="bg-white">
                        <td class="px-3 py-1.5 text-left text-gray-700 font-medium">IVA 12%</td>
                        <td class="px-3 py-1.5 text-right text-gray-700"><span class="text-right"><?php echo e($info['iva_total'] ?? zeros()); ?></span></td>
                    </tr>
                    <tr class="bg-gray-50">
                        <td class="px-3 py-1.5 text-left text-gray-700 font-medium">Propina</td>
                        <td class="px-3 py-1.5 text-right text-gray-700"><span class="text-right"><?php echo e($info['tip_total'] ?? zeros()); ?></span></td>
                    </tr>
                    <tr class="bg-white">
                        <td class="px-3 py-1.5 text-left text-gray-700 font-medium">Valor total</td>
                        <td class="px-3 py-1.5 text-right text-gray-700"><?php echo e($info['total'] ?? zeros()); ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal511d4862ff04963c3c16115c05a86a9d)): ?>
<?php $attributes = $__attributesOriginal511d4862ff04963c3c16115c05a86a9d; ?>
<?php unset($__attributesOriginal511d4862ff04963c3c16115c05a86a9d); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal511d4862ff04963c3c16115c05a86a9d)): ?>
<?php $component = $__componentOriginal511d4862ff04963c3c16115c05a86a9d; ?>
<?php unset($__componentOriginal511d4862ff04963c3c16115c05a86a9d); ?>
<?php endif; ?>
<?php /**PATH /Users/vittoriodormi/Desktop/VITTOSHEVA/GitHub/LARAVEL/Clients/ControlInternacionalInspector/resources/views/forms/components/info-values-table.blade.php ENDPATH**/ ?>