<button
    x-data="<?php echo e(json_encode(['visible' => $visible])); ?>"
    x-show="visible"
    wire:click="clear"
    wire:loading.attr="disabled"
    wire:key="clear-cache-button"
    type="button"
    class="flex flex-shrink-0 w-10 h-10 rounded-full bg-gray-200 items-center justify-center relative dark:bg-gray-900"
    x-tooltip.raw="<?php echo e(__('filament-clear-cache::general.clear_cache')); ?>"
>
    <?php echo e(svg('heroicon-s-trash', 'w-5 h-5', ['wire:loading.remove.delay'])); ?>

    <?php if (isset($component)) { $__componentOriginalbef7c2371a870b1887ec3741fe311a10 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalbef7c2371a870b1887ec3741fe311a10 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'filament::components.loading-indicator','data' => ['xCloak' => true,'wire:loading.delay' => true,'wire:target' => 'clear','class' => 'filament-button-icon w-5 h-5']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('filament::loading-indicator'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['x-cloak' => true,'wire:loading.delay' => true,'wire:target' => 'clear','class' => 'filament-button-icon w-5 h-5']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalbef7c2371a870b1887ec3741fe311a10)): ?>
<?php $attributes = $__attributesOriginalbef7c2371a870b1887ec3741fe311a10; ?>
<?php unset($__attributesOriginalbef7c2371a870b1887ec3741fe311a10); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalbef7c2371a870b1887ec3741fe311a10)): ?>
<?php $component = $__componentOriginalbef7c2371a870b1887ec3741fe311a10; ?>
<?php unset($__componentOriginalbef7c2371a870b1887ec3741fe311a10); ?>
<?php endif; ?>

    <?php if($cache_count): ?>
        <span x-cloak
              class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                  "flex items-center justify-center rounded-full bg-primary-500 text-white text-center overflow-hidden absolute text-xs font-bold",
                  "w-5 h-5" => $cache_count <= 99,
                  "w-6 h-6" => $cache_count > 99,
              ]); ?>"
              style="top:-0.4rem;right:-0.4rem;line-height:1;letter-spacing:-1px;font-size:10px;font-weight:600;word-spacing:-1px;"
        >
            <?php if($cache_count > 99): ?>
                <span>99<span style="vertical-align:text-top;">+</span></span>
            <?php else: ?>
                <?php echo e($cache_count); ?>

            <?php endif; ?>
        </span>
    <?php endif; ?>
</button>
<?php /**PATH /var/www/Clients/ControlInternacionalInspector/vendor/cms-multi/filament-clear-cache/resources/views/livewire/clear-cache-button.blade.php ENDPATH**/ ?>