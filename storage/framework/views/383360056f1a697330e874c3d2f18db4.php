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
        <?php $__currentLoopData = $bathrooms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $bathroom): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td class="p-2"><?php echo e($bathroom); ?></td>
                <td class="p-2 text-center">
                    <input
                        type="checkbox"
                        wire:key="data.<?php echo e($relationName); ?>.<?php echo e($id); ?>.men"
                        wire:model="data.<?php echo e($relationName); ?>.<?php echo e($id); ?>.men"
                        wire:click.lazy="addBathroomCheck(<?php echo e($id); ?>,'men')"
                        <?php if($operation === 'view'): ?> disabled <?php endif; ?>
                        class="fi-checkbox-input rounded border-none bg-white shadow-sm ring-1 transition duration-75 checked:ring-0 focus:ring-2 focus:ring-offset-0 disabled:pointer-events-none disabled:bg-gray-50 disabled:text-gray-50 disabled:checked:bg-current disabled:checked:text-gray-400 dark:bg-white/5 dark:disabled:bg-transparent dark:disabled:checked:bg-gray-600 text-primary-600 ring-gray-950/10 focus:ring-primary-600 checked:focus:ring-primary-500/50 dark:text-primary-500 dark:ring-white/20 dark:checked:bg-primary-500 dark:focus:ring-primary-500 dark:checked:focus:ring-primary-400/50 dark:disabled:ring-white/10 mt-1"
                    >
                </td>
                <td class="p-2 text-center">
                    <input
                        type="checkbox"
                        wire:key="data.<?php echo e($relationName); ?>.<?php echo e($id); ?>.women"
                        wire:model="data.<?php echo e($relationName); ?>.<?php echo e($id); ?>.women"
                        wire:click.lazy="addBathroomCheck(<?php echo e($id); ?>,'women')"
                        <?php if($operation === 'view'): ?> disabled <?php endif; ?>
                        class="fi-checkbox-input rounded border-none bg-white shadow-sm ring-1 transition duration-75 checked:ring-0 focus:ring-2 focus:ring-offset-0 disabled:pointer-events-none disabled:bg-gray-50 disabled:text-gray-50 disabled:checked:bg-current disabled:checked:text-gray-400 dark:bg-white/5 dark:disabled:bg-transparent dark:disabled:checked:bg-gray-600 text-primary-600 ring-gray-950/10 focus:ring-primary-600 checked:focus:ring-primary-500/50 dark:text-primary-500 dark:ring-white/20 dark:checked:bg-primary-500 dark:focus:ring-primary-500 dark:checked:focus:ring-primary-400/50 dark:disabled:ring-white/10 mt-1"
                    >
                </td>
                <td class="p-2 text-center">
                    <input
                        type="checkbox"
                        wire:key="data.<?php echo e($relationName); ?>.<?php echo e($id); ?>.disability_person"
                        wire:model="data.<?php echo e($relationName); ?>.<?php echo e($id); ?>.disability_person"
                        wire:click.lazy="addBathroomCheck(<?php echo e($id); ?>,'disability_person')"
                        <?php if($operation === 'view'): ?> disabled <?php endif; ?>
                        class="fi-checkbox-input rounded border-none bg-white shadow-sm ring-1 transition duration-75 checked:ring-0 focus:ring-2 focus:ring-offset-0 disabled:pointer-events-none disabled:bg-gray-50 disabled:text-gray-50 disabled:checked:bg-current disabled:checked:text-gray-400 dark:bg-white/5 dark:disabled:bg-transparent dark:disabled:checked:bg-gray-600 text-primary-600 ring-gray-950/10 focus:ring-primary-600 checked:focus:ring-primary-500/50 dark:text-primary-500 dark:ring-white/20 dark:checked:bg-primary-500 dark:focus:ring-primary-500 dark:checked:focus:ring-primary-400/50 dark:disabled:ring-white/10 mt-1"
                    >
                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div>
<?php /**PATH /Users/vittoriodormi/Desktop/VITTOSHEVA/GitHub/LARAVEL/Clients/ControlInternacionalInspector/resources/views/livewire/bathrooms-panel.blade.php ENDPATH**/ ?>