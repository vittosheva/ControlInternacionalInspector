<?php if (isset($component)) { $__componentOriginalf7690039e327e71c1c1930ed6f608619 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf7690039e327e71c1c1930ed6f608619 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'filament-tiptap-editor::components.dropdown-button','data' => ['label' => ''.e(trans('filament-tiptap-editor::editor.color.label')).'','active' => 'color','icon' => 'color','list' => false]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('filament-tiptap-editor::dropdown-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => ''.e(trans('filament-tiptap-editor::editor.color.label')).'','active' => 'color','icon' => 'color','list' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(false)]); ?>
    <div
        x-data="{
            state: editor().getAttributes('textStyle').color || '#000000',

            init: function () {
                if (!(this.state === null || this.state === '')) {
                    this.setState(this.state)
                }
            },

            setState: function (value) {
                this.state = value
            }
        }"
        x-on:keydown.esc="isOpen() && $event.stopPropagation()"
        class="relative flex-1 p-1"
    >
        <tiptap-hex-color-picker x-bind:color="state" x-on:color-changed="setState($event.detail.value)"></tiptap-hex-color-picker>

        <div class="w-full flex gap-2 mt-2">
            <?php if (isset($component)) { $__componentOriginal6330f08526bbb3ce2a0da37da512a11f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal6330f08526bbb3ce2a0da37da512a11f = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'filament::components.button.index','data' => ['xOn:click' => 'editor().chain().focus().setColor(state).run(); $dispatch(\'close-panel\')','size' => 'sm','class' => 'flex-1']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('filament::button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['x-on:click' => 'editor().chain().focus().setColor(state).run(); $dispatch(\'close-panel\')','size' => 'sm','class' => 'flex-1']); ?>
                <?php echo e(trans('filament-tiptap-editor::editor.color.choose')); ?>

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

            <?php if (isset($component)) { $__componentOriginal6330f08526bbb3ce2a0da37da512a11f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal6330f08526bbb3ce2a0da37da512a11f = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'filament::components.button.index','data' => ['xOn:click' => 'editor().chain().focus().unsetColor().run(); $dispatch(\'close-panel\')','size' => 'sm','class' => 'flex-1','color' => 'danger']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('filament::button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['x-on:click' => 'editor().chain().focus().unsetColor().run(); $dispatch(\'close-panel\')','size' => 'sm','class' => 'flex-1','color' => 'danger']); ?>
                <?php echo e(trans('filament-tiptap-editor::editor.color.remove')); ?>

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
        </div>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf7690039e327e71c1c1930ed6f608619)): ?>
<?php $attributes = $__attributesOriginalf7690039e327e71c1c1930ed6f608619; ?>
<?php unset($__attributesOriginalf7690039e327e71c1c1930ed6f608619); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf7690039e327e71c1c1930ed6f608619)): ?>
<?php $component = $__componentOriginalf7690039e327e71c1c1930ed6f608619; ?>
<?php unset($__componentOriginalf7690039e327e71c1c1930ed6f608619); ?>
<?php endif; ?><?php /**PATH /Users/vittoriodormi/Desktop/VITTOSHEVA/GitHub/LARAVEL/Clients/ControlInternacionalInspector/vendor/awcodes/filament-tiptap-editor/resources/views/components/tools/color.blade.php ENDPATH**/ ?>