<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps([
    'title'     => __('Barcode'),
    'name'      => 'bar_code',
    'barcode'   => '',
    'class'     => '',
    'width'     => '',
    'style'     => '',
    'showTitle' => true,
    'showIf'    => true,
]) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps([
    'title'     => __('Barcode'),
    'name'      => 'bar_code',
    'barcode'   => '',
    'class'     => '',
    'width'     => '',
    'style'     => '',
    'showTitle' => true,
    'showIf'    => true,
]); ?>
<?php foreach (array_filter(([
    'title'     => __('Barcode'),
    'name'      => 'bar_code',
    'barcode'   => '',
    'class'     => '',
    'width'     => '',
    'style'     => '',
    'showTitle' => true,
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
    <div class="<?php echo \Illuminate\Support\Arr::toCssClasses([$class => ! empty($class)]); ?>">
        <?php if($showTitle): ?>
            <div class="flex justify-between items-center">
                <label for="<?php echo e($name); ?>" class="flex mb-1 font-semibold text-gray-700"><?php echo e($title); ?></label>
            </div>
        <?php endif; ?>
        <div class="mx-auto text-center">
            <?php if($barcode && is_string($barcode)): ?>
                <?php if(isValidXML($barcode)): ?>
                    <?php echo $barcode; ?>

                <?php else: ?>
                    <img src="data:image/png;base64,<?php echo base64_encode($barcode); ?>" alt="barcode" style="height:50px;width:100%;"/>
                <?php endif; ?>
            <?php else: ?>
                <?php echo e(__('There is no barcode')); ?>

            <?php endif; ?>

            
        </div>
    </div>
<?php endif; ?>
<?php /**PATH /var/www/Clients/ControlInternacionalInspector/resources/views/components/barcode-show.blade.php ENDPATH**/ ?>