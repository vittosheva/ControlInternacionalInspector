<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps([
    'circular' => true,
    'size' => 'md',
]) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps([
    'circular' => true,
    'size' => 'md',
]); ?>
<?php foreach (array_filter(([
    'circular' => true,
    'size' => 'md',
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>
<div>
    <img
        <?php echo e($attributes
                ->class([
                    'fi-avatar object-cover object-center',
                ])); ?>

        src='<?php echo e($getState()); ?>'
        alt=""
    />
</div>
<?php /**PATH /Users/vittoriodormi/Desktop/VITTOSHEVA/GitHub/LARAVEL/Clients/ControlInternacionalInspector/resources/views/components/image.blade.php ENDPATH**/ ?>