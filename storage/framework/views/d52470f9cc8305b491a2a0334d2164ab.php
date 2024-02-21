<div>
    <div x-data="">
        <div class="grid gap-8 gap-y-2 text-sm grid-cols-1 lg:grid-cols-10">
            <div class="lg:col-span-2 text-gray-600 space-y-4">
                <?php if (isset($component)) { $__componentOriginal44a508883f9207a939367952373b4021 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal44a508883f9207a939367952373b4021 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'filament::components.fieldset','data' => ['class' => 'bg-slate-100']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('filament::fieldset'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'bg-slate-100']); ?>
                     <?php $__env->slot('label', null, []); ?> Mangueras disponibles: <?php $__env->endSlot(); ?>
                    <?php if(! empty($dataCollection)): ?>
                        <p class="mb-4">Mangueras inspeccionadas: <?php echo e($dataCollection->count()); ?>/<?php echo e($hoses->count()); ?></p>
                    <?php endif; ?>
                    <div class="h-[22rem] overflow-y-scroll">
                        <div class="p-1 pr-3">
                            <ul class="fi-sidebar-group-items flex flex-col gap-y-2">
                                <?php if(! empty($hoses)): ?>
                                    <?php $__currentLoopData = $hoses->sortBy('name'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hose): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li class="fi-sidebar-item">
                                            <?php if (isset($component)) { $__componentOriginal6330f08526bbb3ce2a0da37da512a11f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal6330f08526bbb3ce2a0da37da512a11f = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'filament::components.button.index','data' => ['wire:click.prevent' => 'openHoseInfo('.e($hose->id).')','id' => ''.e($hose->id).'','class' => '!justify-start w-full','color' => in_array($hose->name, $dataCollection->keys()->toArray()) ? \Filament\Support\Colors\Color::Emerald : 'gray','badgeColor' => \Filament\Support\Colors\Color::Emerald]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('filament::button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:click.prevent' => 'openHoseInfo('.e($hose->id).')','id' => ''.e($hose->id).'','class' => '!justify-start w-full','color' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(in_array($hose->name, $dataCollection->keys()->toArray()) ? \Filament\Support\Colors\Color::Emerald : 'gray'),'badge-color' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(\Filament\Support\Colors\Color::Emerald)]); ?>
                                                <?php if(in_array($hose->name, $dataCollection->keys()->toArray())): ?>
                                                 <?php $__env->slot('badge', null, []); ?> 
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-4 h-4">
                                                        <path fill-rule="evenodd" d="M12.416 3.376a.75.75 0 0 1 .208 1.04l-5 7.5a.75.75 0 0 1-1.154.114l-3-3a.75.75 0 0 1 1.06-1.06l2.353 2.353 4.493-6.74a.75.75 0 0 1 1.04-.207Z" clip-rule="evenodd" />
                                                    </svg>
                                                 <?php $__env->endSlot(); ?>
                                                <?php endif; ?>
                                                <?php if (isset($component)) { $__componentOriginalbef7c2371a870b1887ec3741fe311a10 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalbef7c2371a870b1887ec3741fe311a10 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'filament::components.loading-indicator','data' => ['wire:loading' => true,'wire:target' => 'openHoseData('.e($hose->id).')','class' => 'h-5 w-5']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('filament::loading-indicator'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:loading' => true,'wire:target' => 'openHoseData('.e($hose->id).')','class' => 'h-5 w-5']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalbef7c2371a870b1887ec3741fe311a10)): ?>
<?php $attributes = $__attributesOriginalbef7c2371a870b1887ec3741fe311a10; ?>
<?php unset($__attributesOriginalbef7c2371a870b1887ec3741fe311a10); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalbef7c2371a870b1887ec3741fe311a10)): ?>
<?php $component = $__componentOriginalbef7c2371a870b1887ec3741fe311a10; ?>
<?php unset($__componentOriginalbef7c2371a870b1887ec3741fe311a10); ?>
<?php endif; ?> <?php echo e($loop->iteration); ?>.- <?php echo e($hose->name); ?>

                                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal6330f08526bbb3ce2a0da37da512a11f)): ?>
<?php $attributes = $__attributesOriginal6330f08526bbb3ce2a0da37da512a11f; ?>
<?php unset($__attributesOriginal6330f08526bbb3ce2a0da37da512a11f); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal6330f08526bbb3ce2a0da37da512a11f)): ?>
<?php $component = $__componentOriginal6330f08526bbb3ce2a0da37da512a11f; ?>
<?php unset($__componentOriginal6330f08526bbb3ce2a0da37da512a11f); ?>
<?php endif; ?>
                                        </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php else: ?>
                                    <li class="fi-sidebar-item text-center"> - Ninguna - </li>
                                <?php endif; ?>
                            </ul>
                        </div>
                    </div>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal44a508883f9207a939367952373b4021)): ?>
<?php $attributes = $__attributesOriginal44a508883f9207a939367952373b4021; ?>
<?php unset($__attributesOriginal44a508883f9207a939367952373b4021); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal44a508883f9207a939367952373b4021)): ?>
<?php $component = $__componentOriginal44a508883f9207a939367952373b4021; ?>
<?php unset($__componentOriginal44a508883f9207a939367952373b4021); ?>
<?php endif; ?>
            </div>

            <div class="lg:col-span-8">
                <?php if (isset($component)) { $__componentOriginal44a508883f9207a939367952373b4021 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal44a508883f9207a939367952373b4021 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'filament::components.fieldset','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('filament::fieldset'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                     <?php $__env->slot('label', null, []); ?> Manguera seleccionada: <?php $__env->endSlot(); ?>
                    <?php echo e($this->form); ?>

                    <div class="w-full mx-auto text-center">
                        <?php if (isset($component)) { $__componentOriginal6330f08526bbb3ce2a0da37da512a11f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal6330f08526bbb3ce2a0da37da512a11f = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'filament::components.button.index','data' => ['wire:click.prevent' => 'addControl','size' => 'sm','class' => 'mt-3','color' => \Filament\Support\Colors\Color::Emerald,'disabled' => empty($selectedHose)]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('filament::button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:click.prevent' => 'addControl','size' => 'sm','class' => 'mt-3','color' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(\Filament\Support\Colors\Color::Emerald),'disabled' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(empty($selectedHose))]); ?>Guardar inspección <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal6330f08526bbb3ce2a0da37da512a11f)): ?>
<?php $attributes = $__attributesOriginal6330f08526bbb3ce2a0da37da512a11f; ?>
<?php unset($__attributesOriginal6330f08526bbb3ce2a0da37da512a11f); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal6330f08526bbb3ce2a0da37da512a11f)): ?>
<?php $component = $__componentOriginal6330f08526bbb3ce2a0da37da512a11f; ?>
<?php unset($__componentOriginal6330f08526bbb3ce2a0da37da512a11f); ?>
<?php endif; ?>
                    </div>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal44a508883f9207a939367952373b4021)): ?>
<?php $attributes = $__attributesOriginal44a508883f9207a939367952373b4021; ?>
<?php unset($__attributesOriginal44a508883f9207a939367952373b4021); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal44a508883f9207a939367952373b4021)): ?>
<?php $component = $__componentOriginal44a508883f9207a939367952373b4021; ?>
<?php unset($__componentOriginal44a508883f9207a939367952373b4021); ?>
<?php endif; ?>
            </div>
        </div>

        <?php if (isset($component)) { $__componentOriginal028e05680f6c5b1e293abd7fbe5f9758 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal028e05680f6c5b1e293abd7fbe5f9758 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'filament-actions::components.modals','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('filament-actions::modals'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal028e05680f6c5b1e293abd7fbe5f9758)): ?>
<?php $attributes = $__attributesOriginal028e05680f6c5b1e293abd7fbe5f9758; ?>
<?php unset($__attributesOriginal028e05680f6c5b1e293abd7fbe5f9758); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal028e05680f6c5b1e293abd7fbe5f9758)): ?>
<?php $component = $__componentOriginal028e05680f6c5b1e293abd7fbe5f9758; ?>
<?php unset($__componentOriginal028e05680f6c5b1e293abd7fbe5f9758); ?>
<?php endif; ?>
    </div>
</div>
<?php /**PATH /Users/vittoriodormi/Desktop/VITTOSHEVA/GitHub/LARAVEL/Clients/ControlInternacionalInspector/resources/views/livewire/hoses-panel.blade.php ENDPATH**/ ?>