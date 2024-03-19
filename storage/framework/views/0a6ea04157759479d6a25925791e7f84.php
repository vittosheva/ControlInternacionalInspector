<?php $__env->startSection('title', __('Not Found')); ?>

<?php $__env->startSection('message', __($exception->getMessage() ?: 'Not Found')); ?>
<?php echo $__env->make('errors::layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/Clients/ControlInternacionalInspector/resources/views/errors/404.blade.php ENDPATH**/ ?>