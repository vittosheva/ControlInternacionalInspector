<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps(['heading', 'subheading', 'filters', 'indicatorsCount', 'width', 'filterFormAccessible']) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps(['heading', 'subheading', 'filters', 'indicatorsCount', 'width', 'filterFormAccessible']); ?>
<?php foreach (array_filter((['heading', 'subheading', 'filters', 'indicatorsCount', 'width', 'filterFormAccessible']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>
<div class="filament-apex-charts-header">
    <?php if($heading || $subheading || $filters || $filterFormAccessible): ?>
        <div class="sm:flex justify-between gap-4 py-2 relative">

            <div>
                <?php if($heading): ?>
                    <div class="filament-apex-charts-heading text-base font-semibold leading-6">
                        <?php echo $heading; ?>

                    </div>
                <?php endif; ?>

                <?php if($subheading): ?>
                    <div class="filament-apex-charts-subheading text-sm text-gray-600 dark:text-gray-300">
                        <?php echo $subheading; ?>

                    </div>
                <?php endif; ?>
            </div>

            <div>
                <?php if($filters): ?>
                    <select wire:model="filter" class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                        'apex-charts-single-filter w-full text-gray-900 border-gray-300 block h-10 transition duration-75 rounded-lg shadow-sm focus:border-primary-500 focus:ring-1 focus:ring-inset focus:ring-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-200 dark:focus:border-primary-500',
                    ]); ?>" wire:loading.class="animate-pulse">
                        <?php $__currentLoopData = $filters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($value); ?>">
                                <?php echo e($label); ?>

                            </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                <?php endif; ?>
            </div>

            <?php if($filterFormAccessible): ?>
                <div>

                    <?php if (isset($component)) { $__componentOriginal14fe4ad81efb26cca7f962da4730b5d2 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal14fe4ad81efb26cca7f962da4730b5d2 = $attributes; } ?>
<?php $component = Leandrocfe\FilamentApexCharts\Components\FilterForm::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('filament-apex-charts::filter-form'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Leandrocfe\FilamentApexCharts\Components\FilterForm::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['indicatorsCount' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($indicatorsCount),'width' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($width)]); ?>
                        <?php echo e($filterForm); ?>

                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal14fe4ad81efb26cca7f962da4730b5d2)): ?>
<?php $attributes = $__attributesOriginal14fe4ad81efb26cca7f962da4730b5d2; ?>
<?php unset($__attributesOriginal14fe4ad81efb26cca7f962da4730b5d2); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal14fe4ad81efb26cca7f962da4730b5d2)): ?>
<?php $component = $__componentOriginal14fe4ad81efb26cca7f962da4730b5d2; ?>
<?php unset($__componentOriginal14fe4ad81efb26cca7f962da4730b5d2); ?>
<?php endif; ?>

                </div>
            <?php endif; ?>

        </div>
    <?php endif; ?>
</div>
<?php /**PATH /var/www/Clients/ControlInternacionalInspector/vendor/leandrocfe/filament-apex-charts/resources/views/widgets/components/header.blade.php ENDPATH**/ ?>