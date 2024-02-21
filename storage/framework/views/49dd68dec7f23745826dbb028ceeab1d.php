<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps([
    'title'     => __('QR Code'),
    'name'      => 'qr_code',
    'qrCode'    => '',
    'class'     => 'mx-auto',
    'width'     => '75',
    'style'     => '',
    'showTitle' => false,
    'align'     => 'center',
    'showIf'    => true,
]) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps([
    'title'     => __('QR Code'),
    'name'      => 'qr_code',
    'qrCode'    => '',
    'class'     => 'mx-auto',
    'width'     => '75',
    'style'     => '',
    'showTitle' => false,
    'align'     => 'center',
    'showIf'    => true,
]); ?>
<?php foreach (array_filter(([
    'title'     => __('QR Code'),
    'name'      => 'qr_code',
    'qrCode'    => '',
    'class'     => 'mx-auto',
    'width'     => '75',
    'style'     => '',
    'showTitle' => false,
    'align'     => 'center',
    'showIf'    => true,
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>
<?php if($showIf): ?>
    <div>
        <?php if($showTitle): ?>
            <div class="flex justify-between items-center">
                <label for="<?php echo e($name); ?>" class="flex mb-1 font-semibold text-gray-700"><?php echo e($title); ?></label>
            </div>
        <?php endif; ?>
        <div class="mx-auto text-<?php echo e($align); ?>">
            <?php if(! empty($qrCode)): ?>
                <img src="data:image/png;base64,<?php echo e($qrCode); ?>" alt="<?php echo e(__('QR Code')); ?>" id="<?php echo e($name); ?>" class="<?php echo \Illuminate\Support\Arr::toCssClasses($class); ?>" width="<?php echo e($width); ?>">
            <?php else: ?>
                <?php echo e('No existe código QR'); ?>

            <?php endif; ?>
        </div>
    </div>
<?php endif; ?>
<?php /**PATH /Users/vittoriodormi/Desktop/VITTOSHEVA/GitHub/LARAVEL/Clients/ControlInternacionalInspector/resources/views/components/qrcode-show.blade.php ENDPATH**/ ?>