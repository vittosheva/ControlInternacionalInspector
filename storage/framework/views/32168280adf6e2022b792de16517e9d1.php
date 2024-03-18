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
        $statePath = $getStatePath();
        $pilColor = $getPilColor();
        $id = $getId();
        $rowData = $getRowData();
        $columnData = $getColumnData();
    ?>

    <div class="overflow-hidden shadow ring-1 ring-gray-200 dark:ring-white/10 ring-opacity-5 rounded-lg">
        <table class="w-full table-auto divide-y divide-gray-200 dark:divide-white/5 bg-white dark:bg-gray-900">
            <thead>
            <tr class="p-2 bg-gray-50 dark:bg-gray-800">
                <td></td>
                <?php $__currentLoopData = $columnData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $column): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <td class="p-2 text-center"><?php echo e($column); ?></td>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $rowData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rowKey => $rowValue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td class="p-2"><?php echo e($rowValue); ?></td>
                        <?php $__currentLoopData = $columnData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $columnKey => $columnValue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                                $supStatPath = ($pilColor === 'radio') ? $statePath.'.'.$rowKey : $statePath.'.'.$rowKey.'.'.$columnKey ;
                            ?>
                            <td class="p-2 text-center">
                                <input
                                    wire:key="<?php echo e($id); ?>.<?php echo e($rowKey); ?>"
                                    wire:loading.attr="disabled"
                                    <?php echo e($applyStateBindingModifiers('wire:model')); ?>="<?php echo e($supStatPath); ?>"
                                    value="<?php echo e($columnKey); ?>"
                                    type="<?php echo e($pilColor); ?>"
                                    class="mt-1 border-none bg-white shadow-sm ring-1 transition duration-75 checked:ring-0 focus:ring-2 focus:ring-offset-0 disabled:bg-gray-50 disabled:text-gray-50 disabled:checked:bg-current disabled:checked:text-gray-400 dark:bg-white/5 dark:disabled:bg-transparent dark:disabled:checked:bg-gray-600 text-primary-600 ring-gray-950/10 focus:ring-primary-600 checked:focus:ring-primary-500/50 dark:text-primary-500 dark:ring-white/20 dark:checked:bg-primary-500 dark:focus:ring-primary-500 dark:checked:focus:ring-primary-400/50 dark:disabled:ring-white/10"
                                />
                            </td>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
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
<?php /**PATH /var/www/Clients/ControlInternacionalInspector/vendor/lara-zeus/matrix-choice/resources/views/components/matrix-choice.blade.php ENDPATH**/ ?>