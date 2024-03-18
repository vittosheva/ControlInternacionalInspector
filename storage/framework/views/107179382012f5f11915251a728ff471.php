<?php $__env->startSection('title', __('Server Error')); ?>


<?php $__env->startSection('message', $exception->getMessage()); ?>

<?php echo $__env->make('errors::layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/Clients/ControlInternacionalInspector/resources/views/errors/500.blade.php ENDPATH**/ ?>