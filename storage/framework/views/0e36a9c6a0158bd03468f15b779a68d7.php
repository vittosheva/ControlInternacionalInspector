<div class="my-2 text-sm font-medium tracking-tight">
    <?php $__currentLoopData = $getState() ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <span class="inline-block p-1 mr-1 rounded-md whitespace-normal text-gray-700 dark:text-gray-200 bg-gray-500/10">
            <?php echo e($key); ?>

        </span>
        <?php if (! (is_array($value))): ?>
            <?php echo e($value); ?>

        <?php else: ?>
            <span class="divide-x divide-solid divide-gray-200 dark:divide-gray-700">
                <?php $__currentLoopData = $value; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $nestedValue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php echo e($nestedValue['id']); ?>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </span>
        <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<?php /**PATH /var/www/Clients/ControlInternacionalInspector/vendor/tapp/filament-auditing/resources/views/tables/columns/key-value.blade.php ENDPATH**/ ?>