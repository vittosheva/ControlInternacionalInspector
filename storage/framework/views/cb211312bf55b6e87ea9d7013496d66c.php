<?php if (isset($component)) { $__componentOriginal74117f8bb7cf8ec0e06f3d6b01d14a31 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal74117f8bb7cf8ec0e06f3d6b01d14a31 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'filament-tiptap-editor::components.button','data' => ['action' => 'editor().chain().focus().setTextAlign(\'end\').run()','active' => '{ textAlign: \'end\' }','label' => ''.e(config('filament-tiptap-editor.direction') === 'rtl'
            ? trans('filament-tiptap-editor::editor.align_left')
            : trans('filament-tiptap-editor::editor.align_right')).'','icon' => ''.e(config('filament-tiptap-editor.direction') === 'rtl'
            ? 'align-left'
            : 'align-right').'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('filament-tiptap-editor::button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['action' => 'editor().chain().focus().setTextAlign(\'end\').run()','active' => '{ textAlign: \'end\' }','label' => ''.e(config('filament-tiptap-editor.direction') === 'rtl'
            ? trans('filament-tiptap-editor::editor.align_left')
            : trans('filament-tiptap-editor::editor.align_right')).'','icon' => ''.e(config('filament-tiptap-editor.direction') === 'rtl'
            ? 'align-left'
            : 'align-right').'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal74117f8bb7cf8ec0e06f3d6b01d14a31)): ?>
<?php $attributes = $__attributesOriginal74117f8bb7cf8ec0e06f3d6b01d14a31; ?>
<?php unset($__attributesOriginal74117f8bb7cf8ec0e06f3d6b01d14a31); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal74117f8bb7cf8ec0e06f3d6b01d14a31)): ?>
<?php $component = $__componentOriginal74117f8bb7cf8ec0e06f3d6b01d14a31; ?>
<?php unset($__componentOriginal74117f8bb7cf8ec0e06f3d6b01d14a31); ?>
<?php endif; ?>
<?php /**PATH /var/www/Clients/ControlInternacionalInspector/vendor/awcodes/filament-tiptap-editor/resources/views/components/tools/align-right.blade.php ENDPATH**/ ?>