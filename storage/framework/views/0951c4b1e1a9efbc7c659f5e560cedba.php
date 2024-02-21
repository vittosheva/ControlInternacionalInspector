<div x-init="resourceLockObserverInit">

    <script>
        function resourceLockObserverInit() {
            Livewire.dispatch('resourceLockObserver::init')
        }

        window.onbeforeunload = function () {
            Livewire.dispatch('resourceLockObserver::unload')
        };

        window.addEventListener('close-modal', event => {
            if (event.detail.id.endsWith('-table-action')) {
                Livewire.dispatch('resourceLockObserver::unload')
            }
        })
    </script>

    <?php if (isset($component)) { $__componentOriginal0942a211c37469064369f887ae8d1cef = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal0942a211c37469064369f887ae8d1cef = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'filament::components.modal.index','data' => ['id' => 'resourceIsLockedNotice','displayClasses' => 'block','closeButton' => false,'disabled' => true,'closeByClickingAway' => false]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('filament::modal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'resourceIsLockedNotice','displayClasses' => 'block','closeButton' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(false),'disabled' => true,'closeByClickingAway' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(false)]); ?>
        <div x-data="{ resourceLockOwner: null}"  @open-modal.window="(event) => { resourceLockOwner = event.detail.resourceLockOwner}">
            <div class="flex justify-center ">
                <?php if (isset($component)) { $__componentOriginalf0029cce6d19fd6d472097ff06a800a1 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf0029cce6d19fd6d472097ff06a800a1 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'filament::components.icon-button','data' => ['icon' => 'heroicon-s-lock-closed','size' => 'lg']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('filament::icon-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'heroicon-s-lock-closed','size' => 'lg']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf0029cce6d19fd6d472097ff06a800a1)): ?>
<?php $attributes = $__attributesOriginalf0029cce6d19fd6d472097ff06a800a1; ?>
<?php unset($__attributesOriginalf0029cce6d19fd6d472097ff06a800a1); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf0029cce6d19fd6d472097ff06a800a1)): ?>
<?php $component = $__componentOriginalf0029cce6d19fd6d472097ff06a800a1; ?>
<?php unset($__componentOriginalf0029cce6d19fd6d472097ff06a800a1); ?>
<?php endif; ?>
            </div>
            <p x-show="resourceLockOwner" class="text-center">
                <span  x-text="resourceLockOwner" class="font-bold"></span> <?php echo e(__('resource-lock::modal.locked_notice_user')); ?>

            </p>
            <p x-show="resourceLockOwner === null" class="text-center">
                <?php echo e(__('resource-lock::modal.locked_notice')); ?>

            </p>
        </div>

        <div x-data="{url: '/'}" @open-modal.window="(event) => { url = event.detail.returnUrl}" class="flex flex-col justify-center space-y-2">

            <?php if($isAllowedToUnlock): ?>
                <button wire:click="$dispatch('resourceLockObserver::unlock')" style="--c-400:var(--danger-400);--c-500:var(--danger-500);--c-600:var(--danger-600);" class="fi-btn fi-btn-size-md relative grid-flow-col items-center justify-center font-semibold outline-none transition duration-75 focus:ring-2 disabled:pointer-events-none disabled:opacity-70 rounded-lg fi-btn-color-danger gap-1.5 px-3 py-2 text-sm inline-grid shadow-sm bg-custom-600 text-white hover:bg-custom-500 dark:bg-custom-500 dark:hover:bg-custom-400 focus:ring-custom-500/50 dark:focus:ring-custom-400/50 fi-ac-btn-action">
                    <?php echo e(__('resource-lock::modal.unlock_button')); ?>

                </button>
            <?php endif; ?>

            <a style="--c-400:var(--primary-400);--c-500:var(--primary-500);--c-600:var(--primary-600);"
               class="fi-btn fi-btn-size-md relative grid-flow-col items-center justify-center font-semibold outline-none transition duration-75 focus:ring-2 disabled:pointer-events-none disabled:opacity-70 rounded-lg fi-btn-color-primary gap-1.5 px-3 py-2 text-sm inline-grid shadow-sm bg-custom-600 text-white hover:bg-custom-500 dark:bg-custom-500 dark:hover:bg-custom-400 focus:ring-custom-500/50 dark:focus:ring-custom-400/50 fi-ac-btn-action"
               :href="url">
                <span>
                    <?php echo e(__('resource-lock::modal.return_button')); ?>

                </span>
            </a>

        </div>
     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal0942a211c37469064369f887ae8d1cef)): ?>
<?php $attributes = $__attributesOriginal0942a211c37469064369f887ae8d1cef; ?>
<?php unset($__attributesOriginal0942a211c37469064369f887ae8d1cef); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal0942a211c37469064369f887ae8d1cef)): ?>
<?php $component = $__componentOriginal0942a211c37469064369f887ae8d1cef; ?>
<?php unset($__componentOriginal0942a211c37469064369f887ae8d1cef); ?>
<?php endif; ?>
</div>
<?php /**PATH /Users/vittoriodormi/Desktop/VITTOSHEVA/GitHub/LARAVEL/Clients/ControlInternacionalInspector/vendor/kenepa/resource-lock/resources/views/components/resource-lock-observer.blade.php ENDPATH**/ ?>