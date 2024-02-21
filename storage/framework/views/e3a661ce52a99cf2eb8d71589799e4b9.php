<?php $__env->startComponent('mail::message'); ?>
# <?php echo app('translator')->get('Hello!'); ?>

<?php echo app('translator')->get('There has been a failed login attempt to your :app account.', ['app' => config('app.name')]); ?>

> **<?php echo app('translator')->get('Account:'); ?>** <?php echo e($account->email); ?><br/>
> **<?php echo app('translator')->get('Time:'); ?>** <?php echo e($time->toCookieString()); ?><br/>
> **<?php echo app('translator')->get('IP Address:'); ?>** <?php echo e($ipAddress); ?><br/>
> **<?php echo app('translator')->get('Browser:'); ?>** <?php echo e($browser); ?><br/>
<?php if($location && $location['default'] === false): ?>
> **<?php echo app('translator')->get('Location:'); ?>** <?php echo e($location['city'] ?? __('Unknown City')); ?>, <?php echo e($location['state'], __('Unknown State')); ?>

<?php endif; ?>

<?php echo app('translator')->get('If this was you, you can ignore this alert. If you suspect any suspicious activity on your account, please change your password.'); ?>

<?php echo app('translator')->get('Regards,'); ?><br/>
<?php echo e(config('app.name')); ?>

<?php echo $__env->renderComponent(); ?>
<?php /**PATH /Users/vittoriodormi/Desktop/VITTOSHEVA/GitHub/LARAVEL/Clients/ControlInternacionalInspector/vendor/rappasoft/laravel-authentication-log/resources/views/emails/failed.blade.php ENDPATH**/ ?>