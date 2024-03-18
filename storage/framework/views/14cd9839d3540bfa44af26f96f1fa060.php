<div class="filament-widget col-span-full">
    <?php if($visibleWidgets): ?>
        <div>
            <div class="block">
                <nav class="flex space-x-4" aria-label="Tabs">
                    <?php $__currentLoopData = $visibleWidgets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $widget): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <span wire:click="selectWidget(<?php echo e($index); ?>)" class="cursor-pointer <?php echo e($currentWidget === $index ? 'text-gray-700 dark:text-white' : 'text-gray-400'); ?> hover:text-gray-500 rounded-md px-3 py-2 text-sm font-medium">
                            <?php echo e($this->getWidgetDisplayName($widget)); ?>

                        </span>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </nav>
            </div>
        </div>

        <?php echo $this->widgetHTML; ?>

    <?php endif; ?>
</div>
<?php /**PATH /var/www/Clients/ControlInternacionalInspector/vendor/kenepa/multi-widget/resources/views/multi-widget.blade.php ENDPATH**/ ?>