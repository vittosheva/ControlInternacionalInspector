<?php if (isset($component)) { $__componentOriginal59d80b1aec4ae4c914a3e52dede19504 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal59d80b1aec4ae4c914a3e52dede19504 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'filament::components.actions','data' => ['attributes' => \Filament\Support\prepare_inherited_attributes($attributes)]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('filament::actions'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['attributes' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(\Filament\Support\prepare_inherited_attributes($attributes))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal59d80b1aec4ae4c914a3e52dede19504)): ?>
<?php $attributes = $__attributesOriginal59d80b1aec4ae4c914a3e52dede19504; ?>
<?php unset($__attributesOriginal59d80b1aec4ae4c914a3e52dede19504); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal59d80b1aec4ae4c914a3e52dede19504)): ?>
<?php $component = $__componentOriginal59d80b1aec4ae4c914a3e52dede19504; ?>
<?php unset($__componentOriginal59d80b1aec4ae4c914a3e52dede19504); ?>
<?php endif; ?>
<?php /**PATH /Users/vittoriodormi/Desktop/VITTOSHEVA/GitHub/LARAVEL/Clients/ControlInternacionalInspector/vendor/filament/actions/resources/views/components/actions.blade.php ENDPATH**/ ?>