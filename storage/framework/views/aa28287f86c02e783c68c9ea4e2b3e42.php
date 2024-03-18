<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps([
    'editor' => null,
]) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps([
    'editor' => null,
]); ?>
<?php foreach (array_filter(([
    'editor' => null,
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<?php
    $layouts = $editor->getGridLayouts();
?>

<?php if (isset($component)) { $__componentOriginalf7690039e327e71c1c1930ed6f608619 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf7690039e327e71c1c1930ed6f608619 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'filament-tiptap-editor::components.dropdown-button','data' => ['label' => ''.e(trans('filament-tiptap-editor::editor.grid.label')).'','active' => 'grid','icon' => 'grid']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('filament-tiptap-editor::dropdown-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => ''.e(trans('filament-tiptap-editor::editor.grid.label')).'','active' => 'grid','icon' => 'grid']); ?>
    <?php if(in_array('two-columns', $layouts)): ?>
        <?php if (isset($component)) { $__componentOriginal3827cc64736fe7c137cf396d8edaea22 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal3827cc64736fe7c137cf396d8edaea22 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'filament-tiptap-editor::components.dropdown-button-item','data' => ['action' => 'editor().chain().focus().insertGrid({ cols: 2 }).run()']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('filament-tiptap-editor::dropdown-button-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['action' => 'editor().chain().focus().insertGrid({ cols: 2 }).run()']); ?>
            <?php echo e(trans('filament-tiptap-editor::editor.grid.two_columns')); ?>

         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal3827cc64736fe7c137cf396d8edaea22)): ?>
<?php $attributes = $__attributesOriginal3827cc64736fe7c137cf396d8edaea22; ?>
<?php unset($__attributesOriginal3827cc64736fe7c137cf396d8edaea22); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal3827cc64736fe7c137cf396d8edaea22)): ?>
<?php $component = $__componentOriginal3827cc64736fe7c137cf396d8edaea22; ?>
<?php unset($__componentOriginal3827cc64736fe7c137cf396d8edaea22); ?>
<?php endif; ?>
    <?php endif; ?>

    <?php if(in_array('three-columns', $layouts)): ?>
        <?php if (isset($component)) { $__componentOriginal3827cc64736fe7c137cf396d8edaea22 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal3827cc64736fe7c137cf396d8edaea22 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'filament-tiptap-editor::components.dropdown-button-item','data' => ['action' => 'editor().chain().focus().insertGrid({ cols: 3 }).run()']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('filament-tiptap-editor::dropdown-button-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['action' => 'editor().chain().focus().insertGrid({ cols: 3 }).run()']); ?>
            <?php echo e(trans('filament-tiptap-editor::editor.grid.three_columns')); ?>

         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal3827cc64736fe7c137cf396d8edaea22)): ?>
<?php $attributes = $__attributesOriginal3827cc64736fe7c137cf396d8edaea22; ?>
<?php unset($__attributesOriginal3827cc64736fe7c137cf396d8edaea22); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal3827cc64736fe7c137cf396d8edaea22)): ?>
<?php $component = $__componentOriginal3827cc64736fe7c137cf396d8edaea22; ?>
<?php unset($__componentOriginal3827cc64736fe7c137cf396d8edaea22); ?>
<?php endif; ?>
    <?php endif; ?>

    <?php if(in_array('four-columns', $layouts)): ?>
        <?php if (isset($component)) { $__componentOriginal3827cc64736fe7c137cf396d8edaea22 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal3827cc64736fe7c137cf396d8edaea22 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'filament-tiptap-editor::components.dropdown-button-item','data' => ['action' => 'editor().chain().focus().insertGrid({ cols: 4 }).run()']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('filament-tiptap-editor::dropdown-button-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['action' => 'editor().chain().focus().insertGrid({ cols: 4 }).run()']); ?>
            <?php echo e(trans('filament-tiptap-editor::editor.grid.four_columns')); ?>

         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal3827cc64736fe7c137cf396d8edaea22)): ?>
<?php $attributes = $__attributesOriginal3827cc64736fe7c137cf396d8edaea22; ?>
<?php unset($__attributesOriginal3827cc64736fe7c137cf396d8edaea22); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal3827cc64736fe7c137cf396d8edaea22)): ?>
<?php $component = $__componentOriginal3827cc64736fe7c137cf396d8edaea22; ?>
<?php unset($__componentOriginal3827cc64736fe7c137cf396d8edaea22); ?>
<?php endif; ?>
    <?php endif; ?>

    <?php if(in_array('five-columns', $layouts)): ?>
        <?php if (isset($component)) { $__componentOriginal3827cc64736fe7c137cf396d8edaea22 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal3827cc64736fe7c137cf396d8edaea22 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'filament-tiptap-editor::components.dropdown-button-item','data' => ['action' => 'editor().chain().focus().insertGrid({ cols: 5 }).run()']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('filament-tiptap-editor::dropdown-button-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['action' => 'editor().chain().focus().insertGrid({ cols: 5 }).run()']); ?>
            <?php echo e(trans('filament-tiptap-editor::editor.grid.five_columns')); ?>

         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal3827cc64736fe7c137cf396d8edaea22)): ?>
<?php $attributes = $__attributesOriginal3827cc64736fe7c137cf396d8edaea22; ?>
<?php unset($__attributesOriginal3827cc64736fe7c137cf396d8edaea22); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal3827cc64736fe7c137cf396d8edaea22)): ?>
<?php $component = $__componentOriginal3827cc64736fe7c137cf396d8edaea22; ?>
<?php unset($__componentOriginal3827cc64736fe7c137cf396d8edaea22); ?>
<?php endif; ?>
    <?php endif; ?>

    <?php if(in_array('fixed-two-columns', $layouts)): ?>
        <?php if (isset($component)) { $__componentOriginal3827cc64736fe7c137cf396d8edaea22 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal3827cc64736fe7c137cf396d8edaea22 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'filament-tiptap-editor::components.dropdown-button-item','data' => ['action' => 'editor().chain().focus().insertGrid({ cols: 2, type: \'fixed\' }).run()']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('filament-tiptap-editor::dropdown-button-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['action' => 'editor().chain().focus().insertGrid({ cols: 2, type: \'fixed\' }).run()']); ?>
            <?php echo e(trans('filament-tiptap-editor::editor.grid.fixed_two_columns')); ?>

         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal3827cc64736fe7c137cf396d8edaea22)): ?>
<?php $attributes = $__attributesOriginal3827cc64736fe7c137cf396d8edaea22; ?>
<?php unset($__attributesOriginal3827cc64736fe7c137cf396d8edaea22); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal3827cc64736fe7c137cf396d8edaea22)): ?>
<?php $component = $__componentOriginal3827cc64736fe7c137cf396d8edaea22; ?>
<?php unset($__componentOriginal3827cc64736fe7c137cf396d8edaea22); ?>
<?php endif; ?>
    <?php endif; ?>

    <?php if(in_array('fixed-three-columns', $layouts)): ?>
        <?php if (isset($component)) { $__componentOriginal3827cc64736fe7c137cf396d8edaea22 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal3827cc64736fe7c137cf396d8edaea22 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'filament-tiptap-editor::components.dropdown-button-item','data' => ['action' => 'editor().chain().focus().insertGrid({ cols: 3, type: \'fixed\' }).run()']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('filament-tiptap-editor::dropdown-button-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['action' => 'editor().chain().focus().insertGrid({ cols: 3, type: \'fixed\' }).run()']); ?>
            <?php echo e(trans('filament-tiptap-editor::editor.grid.fixed_three_columns')); ?>

         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal3827cc64736fe7c137cf396d8edaea22)): ?>
<?php $attributes = $__attributesOriginal3827cc64736fe7c137cf396d8edaea22; ?>
<?php unset($__attributesOriginal3827cc64736fe7c137cf396d8edaea22); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal3827cc64736fe7c137cf396d8edaea22)): ?>
<?php $component = $__componentOriginal3827cc64736fe7c137cf396d8edaea22; ?>
<?php unset($__componentOriginal3827cc64736fe7c137cf396d8edaea22); ?>
<?php endif; ?>
    <?php endif; ?>

    <?php if(in_array('fixed-four-columns', $layouts)): ?>
        <?php if (isset($component)) { $__componentOriginal3827cc64736fe7c137cf396d8edaea22 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal3827cc64736fe7c137cf396d8edaea22 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'filament-tiptap-editor::components.dropdown-button-item','data' => ['action' => 'editor().chain().focus().insertGrid({ cols: 4, type: \'fixed\' }).run()']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('filament-tiptap-editor::dropdown-button-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['action' => 'editor().chain().focus().insertGrid({ cols: 4, type: \'fixed\' }).run()']); ?>
            <?php echo e(trans('filament-tiptap-editor::editor.grid.fixed_four_columns')); ?>

         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal3827cc64736fe7c137cf396d8edaea22)): ?>
<?php $attributes = $__attributesOriginal3827cc64736fe7c137cf396d8edaea22; ?>
<?php unset($__attributesOriginal3827cc64736fe7c137cf396d8edaea22); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal3827cc64736fe7c137cf396d8edaea22)): ?>
<?php $component = $__componentOriginal3827cc64736fe7c137cf396d8edaea22; ?>
<?php unset($__componentOriginal3827cc64736fe7c137cf396d8edaea22); ?>
<?php endif; ?>
    <?php endif; ?>

    <?php if(in_array('fixed-five-columns', $layouts)): ?>
        <?php if (isset($component)) { $__componentOriginal3827cc64736fe7c137cf396d8edaea22 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal3827cc64736fe7c137cf396d8edaea22 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'filament-tiptap-editor::components.dropdown-button-item','data' => ['action' => 'editor().chain().focus().insertGrid({ cols: 5, type: \'fixed\' }).run()']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('filament-tiptap-editor::dropdown-button-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['action' => 'editor().chain().focus().insertGrid({ cols: 5, type: \'fixed\' }).run()']); ?>
            <?php echo e(trans('filament-tiptap-editor::editor.grid.fixed_five_columns')); ?>

         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal3827cc64736fe7c137cf396d8edaea22)): ?>
<?php $attributes = $__attributesOriginal3827cc64736fe7c137cf396d8edaea22; ?>
<?php unset($__attributesOriginal3827cc64736fe7c137cf396d8edaea22); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal3827cc64736fe7c137cf396d8edaea22)): ?>
<?php $component = $__componentOriginal3827cc64736fe7c137cf396d8edaea22; ?>
<?php unset($__componentOriginal3827cc64736fe7c137cf396d8edaea22); ?>
<?php endif; ?>
    <?php endif; ?>

    <?php if(in_array('asymmetric-left-thirds', $layouts)): ?>
        <?php if (isset($component)) { $__componentOriginal3827cc64736fe7c137cf396d8edaea22 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal3827cc64736fe7c137cf396d8edaea22 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'filament-tiptap-editor::components.dropdown-button-item','data' => ['action' => 'editor().chain().focus().insertGrid({ cols: 2, type: \'asymetric-left-thirds\' }).run()']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('filament-tiptap-editor::dropdown-button-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['action' => 'editor().chain().focus().insertGrid({ cols: 2, type: \'asymetric-left-thirds\' }).run()']); ?>
            <?php echo e(trans('filament-tiptap-editor::editor.grid.asymmetric_left_thirds')); ?>

         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal3827cc64736fe7c137cf396d8edaea22)): ?>
<?php $attributes = $__attributesOriginal3827cc64736fe7c137cf396d8edaea22; ?>
<?php unset($__attributesOriginal3827cc64736fe7c137cf396d8edaea22); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal3827cc64736fe7c137cf396d8edaea22)): ?>
<?php $component = $__componentOriginal3827cc64736fe7c137cf396d8edaea22; ?>
<?php unset($__componentOriginal3827cc64736fe7c137cf396d8edaea22); ?>
<?php endif; ?>
    <?php endif; ?>

    <?php if(in_array('asymmetric-right-thirds', $layouts)): ?>
        <?php if (isset($component)) { $__componentOriginal3827cc64736fe7c137cf396d8edaea22 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal3827cc64736fe7c137cf396d8edaea22 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'filament-tiptap-editor::components.dropdown-button-item','data' => ['action' => 'editor().chain().focus().insertGrid({ cols: 2, type: \'asymetric-right-thirds\' }).run()']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('filament-tiptap-editor::dropdown-button-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['action' => 'editor().chain().focus().insertGrid({ cols: 2, type: \'asymetric-right-thirds\' }).run()']); ?>
            <?php echo e(trans('filament-tiptap-editor::editor.grid.asymmetric_right_thirds')); ?>

         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal3827cc64736fe7c137cf396d8edaea22)): ?>
<?php $attributes = $__attributesOriginal3827cc64736fe7c137cf396d8edaea22; ?>
<?php unset($__attributesOriginal3827cc64736fe7c137cf396d8edaea22); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal3827cc64736fe7c137cf396d8edaea22)): ?>
<?php $component = $__componentOriginal3827cc64736fe7c137cf396d8edaea22; ?>
<?php unset($__componentOriginal3827cc64736fe7c137cf396d8edaea22); ?>
<?php endif; ?>
    <?php endif; ?>

    <?php if(in_array('asymmetric-left-fourths', $layouts)): ?>
        <?php if (isset($component)) { $__componentOriginal3827cc64736fe7c137cf396d8edaea22 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal3827cc64736fe7c137cf396d8edaea22 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'filament-tiptap-editor::components.dropdown-button-item','data' => ['action' => 'editor().chain().focus().insertGrid({ cols: 2, type: \'asymetric-left-fourths\' }).run()']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('filament-tiptap-editor::dropdown-button-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['action' => 'editor().chain().focus().insertGrid({ cols: 2, type: \'asymetric-left-fourths\' }).run()']); ?>
            <?php echo e(trans('filament-tiptap-editor::editor.grid.asymmetric_left_fourths')); ?>

         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal3827cc64736fe7c137cf396d8edaea22)): ?>
<?php $attributes = $__attributesOriginal3827cc64736fe7c137cf396d8edaea22; ?>
<?php unset($__attributesOriginal3827cc64736fe7c137cf396d8edaea22); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal3827cc64736fe7c137cf396d8edaea22)): ?>
<?php $component = $__componentOriginal3827cc64736fe7c137cf396d8edaea22; ?>
<?php unset($__componentOriginal3827cc64736fe7c137cf396d8edaea22); ?>
<?php endif; ?>
    <?php endif; ?>

    <?php if(in_array('asymmetric-right-fourths', $layouts)): ?>
        <?php if (isset($component)) { $__componentOriginal3827cc64736fe7c137cf396d8edaea22 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal3827cc64736fe7c137cf396d8edaea22 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'filament-tiptap-editor::components.dropdown-button-item','data' => ['action' => 'editor().chain().focus().insertGrid({ cols: 2, type: \'asymetric-right-fourths\' }).run()']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('filament-tiptap-editor::dropdown-button-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['action' => 'editor().chain().focus().insertGrid({ cols: 2, type: \'asymetric-right-fourths\' }).run()']); ?>
            <?php echo e(trans('filament-tiptap-editor::editor.grid.asymmetric_right_fourths')); ?>

         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal3827cc64736fe7c137cf396d8edaea22)): ?>
<?php $attributes = $__attributesOriginal3827cc64736fe7c137cf396d8edaea22; ?>
<?php unset($__attributesOriginal3827cc64736fe7c137cf396d8edaea22); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal3827cc64736fe7c137cf396d8edaea22)): ?>
<?php $component = $__componentOriginal3827cc64736fe7c137cf396d8edaea22; ?>
<?php unset($__componentOriginal3827cc64736fe7c137cf396d8edaea22); ?>
<?php endif; ?>
    <?php endif; ?>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf7690039e327e71c1c1930ed6f608619)): ?>
<?php $attributes = $__attributesOriginalf7690039e327e71c1c1930ed6f608619; ?>
<?php unset($__attributesOriginalf7690039e327e71c1c1930ed6f608619); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf7690039e327e71c1c1930ed6f608619)): ?>
<?php $component = $__componentOriginalf7690039e327e71c1c1930ed6f608619; ?>
<?php unset($__componentOriginalf7690039e327e71c1c1930ed6f608619); ?>
<?php endif; ?>
<?php /**PATH /var/www/Clients/ControlInternacionalInspector/vendor/awcodes/filament-tiptap-editor/resources/views/components/tools/grid.blade.php ENDPATH**/ ?>