<div
    <?php echo e($attributes
            ->merge([
                'id' => $getId(),
            ], escape: false)
            ->merge($getExtraAttributes(), escape: false)); ?>

>
    <?php echo e($getChildComponentContainer()); ?>

</div>
<?php /**PATH /var/www/Clients/ControlInternacionalInspector/vendor/filament/forms/resources/views/components/grid.blade.php ENDPATH**/ ?>