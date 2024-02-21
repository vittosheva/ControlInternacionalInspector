<?php
    use Filament\Forms\Components\Actions\Action;

    $containers = $getChildComponentContainers();
    $blockPickerBlocks = $getBlockPickerBlocks();
    $blockPickerColumns = $getBlockPickerColumns();
    $blockPickerWidth = $getBlockPickerWidth();

    $addAction = $getAction($getAddActionName());
    $addBetweenAction = $getAction($getAddBetweenActionName());
    $cloneAction = $getAction($getCloneActionName());
    $collapseAllAction = $getAction($getCollapseAllActionName());
    $expandAllAction = $getAction($getExpandAllActionName());
    $deleteAction = $getAction($getDeleteActionName());
    $moveDownAction = $getAction($getMoveDownActionName());
    $moveUpAction = $getAction($getMoveUpActionName());
    $reorderAction = $getAction($getReorderActionName());
    $extraItemActions = $getExtraItemActions();

    $isAddable = $isAddable();
    $isCloneable = $isCloneable();
    $isCollapsible = $isCollapsible();
    $isDeletable = $isDeletable();
    $isReorderableWithButtons = $isReorderableWithButtons();
    $isReorderableWithDragAndDrop = $isReorderableWithDragAndDrop();

    $statePath = $getStatePath();
?>

<?php if (isset($component)) { $__componentOriginal511d4862ff04963c3c16115c05a86a9d = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal511d4862ff04963c3c16115c05a86a9d = $attributes; } ?>
<?php $component = Illuminate\View\DynamicComponent::resolve(['component' => $getFieldWrapperView()] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('dynamic-component'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\DynamicComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['field' => $field]); ?>
    <div
        x-data="{}"
        <?php echo e($attributes
                ->merge($getExtraAttributes(), escape: false)
                ->class(['fi-fo-builder grid gap-y-4'])); ?>

    >
        <?php if($isCollapsible && ($collapseAllAction->isVisible() || $expandAllAction->isVisible())): ?>
            <div
                class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                    'flex gap-x-3',
                    'hidden' => count($containers) < 2,
                ]); ?>"
            >
                <?php if($collapseAllAction->isVisible()): ?>
                    <span
                        x-on:click="$dispatch('builder-collapse', '<?php echo e($statePath); ?>')"
                    >
                        <?php echo e($collapseAllAction); ?>

                    </span>
                <?php endif; ?>

                <?php if($expandAllAction->isVisible()): ?>
                    <span
                        x-on:click="$dispatch('builder-expand', '<?php echo e($statePath); ?>')"
                    >
                        <?php echo e($expandAllAction); ?>

                    </span>
                <?php endif; ?>
            </div>
        <?php endif; ?>

        <?php if(count($containers)): ?>
            <ul
                x-sortable
                data-sortable-animation-duration="<?php echo e($getReorderAnimationDuration()); ?>"
                wire:end.stop="<?php echo e('mountFormComponentAction(\'' . $statePath . '\', \'reorder\', { items: $event.target.sortable.toArray() })'); ?>"
                class="space-y-4"
            >
                <?php
                    $hasBlockLabels = $hasBlockLabels();
                    $hasBlockNumbers = $hasBlockNumbers();
                ?>

                <?php $__currentLoopData = $containers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $uuid => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        $visibleExtraItemActions = array_filter(
                            $extraItemActions,
                            fn (Action $action): bool => $action(['item' => $uuid])->isVisible(),
                        );
                    ?>

                    <li
                        wire:key="<?php echo e($this->getId()); ?>.<?php echo e($item->getStatePath()); ?>.<?php echo e($field::class); ?>.item"
                        x-data="{
                            isCollapsed: <?php echo \Illuminate\Support\Js::from($isCollapsed($item))->toHtml() ?>,
                        }"
                        x-on:builder-expand.window="$event.detail === '<?php echo e($statePath); ?>' && (isCollapsed = false)"
                        x-on:builder-collapse.window="$event.detail === '<?php echo e($statePath); ?>' && (isCollapsed = true)"
                        x-on:expand="isCollapsed = false"
                        x-sortable-item="<?php echo e($uuid); ?>"
                        class="fi-fo-builder-item rounded-xl bg-white shadow-sm ring-1 ring-gray-950/5 dark:bg-white/5 dark:ring-white/10"
                        x-bind:class="{ 'fi-collapsed overflow-hidden': isCollapsed }"
                    >
                        <?php if($isReorderableWithDragAndDrop || $isReorderableWithButtons || $hasBlockLabels || $isCloneable || $isDeletable || $isCollapsible || count($visibleExtraItemActions)): ?>
                            <div
                                <?php if($isCollapsible): ?>
                                    x-on:click.stop="isCollapsed = !isCollapsed"
                                <?php endif; ?>
                                class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                                    'fi-fo-builder-item-header flex items-center gap-x-3 overflow-hidden px-4 py-3',
                                    'cursor-pointer select-none' => $isCollapsible,
                                ]); ?>"
                            >
                                <?php if($isReorderableWithDragAndDrop || $isReorderableWithButtons): ?>
                                    <ul class="flex items-center gap-x-3">
                                        <?php if($isReorderableWithDragAndDrop): ?>
                                            <li
                                                x-sortable-handle
                                                x-on:click.stop
                                            >
                                                <?php echo e($reorderAction); ?>

                                            </li>
                                        <?php endif; ?>

                                        <?php if($isReorderableWithButtons): ?>
                                            <li x-on:click.stop>
                                                <?php echo e($moveUpAction(['item' => $uuid])->disabled($loop->first)); ?>

                                            </li>

                                            <li x-on:click.stop>
                                                <?php echo e($moveDownAction(['item' => $uuid])->disabled($loop->last)); ?>

                                            </li>
                                        <?php endif; ?>
                                    </ul>
                                <?php endif; ?>

                                <?php if($hasBlockLabels): ?>
                                    <h4
                                        class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                                            'text-sm font-medium text-gray-950 dark:text-white',
                                            'truncate' => $isBlockLabelTruncated(),
                                        ]); ?>"
                                    >
                                        <?php echo e($item->getParentComponent()->getLabel($item->getRawState(), $uuid)); ?>


                                        <?php if($hasBlockNumbers): ?>
                                            <?php echo e($loop->iteration); ?>

                                        <?php endif; ?>
                                    </h4>
                                <?php endif; ?>

                                <?php if($isCloneable || $isDeletable || $isCollapsible || count($visibleExtraItemActions)): ?>
                                    <ul
                                        class="ms-auto flex items-center gap-x-3"
                                    >
                                        <?php $__currentLoopData = $visibleExtraItemActions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $extraItemAction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li x-on:click.stop>
                                                <?php echo e($extraItemAction(['item' => $uuid])); ?>

                                            </li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                        <?php if($isCloneable): ?>
                                            <li x-on:click.stop>
                                                <?php echo e($cloneAction(['item' => $uuid])); ?>

                                            </li>
                                        <?php endif; ?>

                                        <?php if($isDeletable): ?>
                                            <li x-on:click.stop>
                                                <?php echo e($deleteAction(['item' => $uuid])); ?>

                                            </li>
                                        <?php endif; ?>

                                        <?php if($isCollapsible): ?>
                                            <li
                                                class="relative transition"
                                                x-on:click.stop="isCollapsed = !isCollapsed"
                                                x-bind:class="{ '-rotate-180': isCollapsed }"
                                            >
                                                <div
                                                    class="transition"
                                                    x-bind:class="{ 'opacity-0 pointer-events-none': isCollapsed }"
                                                >
                                                    <?php echo e($getAction('collapse')); ?>

                                                </div>

                                                <div
                                                    class="absolute inset-0 rotate-180 transition"
                                                    x-bind:class="{ 'opacity-0 pointer-events-none': ! isCollapsed }"
                                                >
                                                    <?php echo e($getAction('expand')); ?>

                                                </div>
                                            </li>
                                        <?php endif; ?>
                                    </ul>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>

                        <div
                            x-show="! isCollapsed"
                            class="fi-fo-builder-item-content border-t border-gray-100 p-4 dark:border-white/10"
                        >
                            <?php echo e($item); ?>

                        </div>
                    </li>

                    <?php if(! $loop->last): ?>
                        <?php if($isAddable && $addBetweenAction->isVisible()): ?>
                            <li class="relative -top-2 !mt-0 h-0">
                                <div
                                    class="flex w-full justify-center opacity-0 transition duration-75 hover:opacity-100"
                                >
                                    <div
                                        class="fi-fo-builder-block-picker-ctn rounded-lg bg-white dark:bg-gray-900"
                                    >
                                        <?php if (isset($component)) { $__componentOriginalcf011b913eed6cf65506740170d1fccb = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalcf011b913eed6cf65506740170d1fccb = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'filament-forms::components.builder.block-picker','data' => ['action' => $addBetweenAction,'afterItem' => $uuid,'columns' => $blockPickerColumns,'blocks' => $blockPickerBlocks,'statePath' => $statePath,'width' => $blockPickerWidth]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('filament-forms::builder.block-picker'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['action' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($addBetweenAction),'after-item' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($uuid),'columns' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($blockPickerColumns),'blocks' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($blockPickerBlocks),'state-path' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($statePath),'width' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($blockPickerWidth)]); ?>
                                             <?php $__env->slot('trigger', null, []); ?> 
                                                <?php echo e($addBetweenAction); ?>

                                             <?php $__env->endSlot(); ?>
                                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalcf011b913eed6cf65506740170d1fccb)): ?>
<?php $attributes = $__attributesOriginalcf011b913eed6cf65506740170d1fccb; ?>
<?php unset($__attributesOriginalcf011b913eed6cf65506740170d1fccb); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalcf011b913eed6cf65506740170d1fccb)): ?>
<?php $component = $__componentOriginalcf011b913eed6cf65506740170d1fccb; ?>
<?php unset($__componentOriginalcf011b913eed6cf65506740170d1fccb); ?>
<?php endif; ?>
                                    </div>
                                </div>
                            </li>
                        <?php elseif(filled($labelBetweenItems = $getLabelBetweenItems())): ?>
                            <li
                                class="relative border-t border-gray-200 dark:border-white/10"
                            >
                                <span
                                    class="absolute -top-3 left-3 px-1 text-sm font-medium"
                                >
                                    <?php echo e($labelBetweenItems); ?>

                                </span>
                            </li>
                        <?php endif; ?>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        <?php endif; ?>

        <?php if($isAddable): ?>
            <?php if (isset($component)) { $__componentOriginalcf011b913eed6cf65506740170d1fccb = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalcf011b913eed6cf65506740170d1fccb = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'filament-forms::components.builder.block-picker','data' => ['action' => $addAction,'blocks' => $blockPickerBlocks,'columns' => $blockPickerColumns,'statePath' => $statePath,'width' => $blockPickerWidth,'class' => 'flex justify-center']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('filament-forms::builder.block-picker'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['action' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($addAction),'blocks' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($blockPickerBlocks),'columns' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($blockPickerColumns),'state-path' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($statePath),'width' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($blockPickerWidth),'class' => 'flex justify-center']); ?>
                 <?php $__env->slot('trigger', null, []); ?> 
                    <?php echo e($addAction); ?>

                 <?php $__env->endSlot(); ?>
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalcf011b913eed6cf65506740170d1fccb)): ?>
<?php $attributes = $__attributesOriginalcf011b913eed6cf65506740170d1fccb; ?>
<?php unset($__attributesOriginalcf011b913eed6cf65506740170d1fccb); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalcf011b913eed6cf65506740170d1fccb)): ?>
<?php $component = $__componentOriginalcf011b913eed6cf65506740170d1fccb; ?>
<?php unset($__componentOriginalcf011b913eed6cf65506740170d1fccb); ?>
<?php endif; ?>
        <?php endif; ?>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal511d4862ff04963c3c16115c05a86a9d)): ?>
<?php $attributes = $__attributesOriginal511d4862ff04963c3c16115c05a86a9d; ?>
<?php unset($__attributesOriginal511d4862ff04963c3c16115c05a86a9d); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal511d4862ff04963c3c16115c05a86a9d)): ?>
<?php $component = $__componentOriginal511d4862ff04963c3c16115c05a86a9d; ?>
<?php unset($__componentOriginal511d4862ff04963c3c16115c05a86a9d); ?>
<?php endif; ?>
<?php /**PATH /Users/vittoriodormi/Desktop/VITTOSHEVA/GitHub/LARAVEL/Clients/ControlInternacionalInspector/vendor/filament/forms/resources/views/components/builder.blade.php ENDPATH**/ ?>