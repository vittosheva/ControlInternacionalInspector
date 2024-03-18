<?php
    use Filament\Forms\Components\Actions\Action;

    $containers = $getChildComponentContainers();

    $addAction = $getAction($getAddActionName());
    $cloneAction = $getAction($getCloneActionName());
    $deleteAction = $getAction($getDeleteActionName());
    $moveDownAction = $getAction($getMoveDownActionName());
    $moveUpAction = $getAction($getMoveUpActionName());
    $reorderAction = $getAction($getReorderActionName());
    $isReorderableWithButtons = $isReorderableWithButtons();
    $extraItemActions = $getExtraItemActions();

    $headers = $getHeaders();
    $columnWidths = $getColumnWidths();
    $breakPoint = $getBreakPoint();
    $hasContainers = count($containers) > 0;
    $hasHiddenHeader = $shouldHideHeader();
    $statePath = $getStatePath();

    $emptyLabel = $getEmptyLabel();

    $visibleExtraItemActions = [];

    foreach ($containers as $uuid => $row) {
        $visibleExtraItemActions = array_filter(
            $extraItemActions,
            fn (Action $action): bool => $action(['item' => $uuid])->isVisible(),
        );
    }

    $hasActions = $reorderAction->isVisible()
        || $cloneAction->isVisible()
        || $deleteAction->isVisible()
        || $moveUpAction->isVisible()
        || $moveDownAction->isVisible()
        || filled($visibleExtraItemActions);
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
        <?php echo e($attributes->merge($getExtraAttributes())->class([
            'filament-table-repeater-component space-y-6 relative',
            match ($breakPoint) {
                'sm' => 'break-point-sm',
                'lg' => 'break-point-lg',
                'xl' => 'break-point-xl',
                '2xl' => 'break-point-2xl',
                default => 'break-point-md',
            }
        ])); ?>

    >
        <?php if(count($containers) || $emptyLabel !== false): ?>
            <div class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                'filament-table-repeater-container rounded-xl relative ring-1 ring-gray-950/5 dark:ring-white/20',
                'sm:ring-gray-950/5 dark:sm:ring-white/20' => ! $hasContainers && $breakPoint === 'sm',
                'md:ring-gray-950/5 dark:md:ring-white/20' => ! $hasContainers && $breakPoint === 'md',
                'lg:ring-gray-950/5 dark:lg:ring-white/20' => ! $hasContainers && $breakPoint === 'lg',
                'xl:ring-gray-950/5 dark:xl:ring-white/20' => ! $hasContainers && $breakPoint === 'xl',
                '2xl:ring-gray-950/5 dark:2xl:ring-white/20' => ! $hasContainers && $breakPoint === '2xl',
            ]); ?>">
                <table class="w-full">
                    <thead class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                        'filament-table-repeater-header-hidden sr-only' => $hasHiddenHeader,
                        'filament-table-repeater-header rounded-t-xl overflow-hidden border-b border-gray-950/5 dark:border-white/20' => ! $hasHiddenHeader,
                    ]); ?>">
                        <tr class="text-xs md:divide-x md:divide-gray-950/5 dark:md:divide-white/20">
                            <?php $__currentLoopData = $headers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $header): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <th
                                    class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                                        'filament-table-repeater-header-column px-3 py-2 font-medium  bg-gray-100 dark:text-gray-300 dark:bg-gray-900/60',
                                        'ltr:rounded-tl-xl rtl:rounded-tr-xl' => $loop->first,
                                        'ltr:rounded-tr-xl rtl:rounded-tl-xl' => $loop->last && ! $hasActions,
                                        match($getHeadersAlignment()) {
                                          'center' => 'text-center',
                                          'right' => 'text-right rtl:text-left',
                                          default => 'text-left rtl:text-right'
                                        }
                                    ]); ?>"
                                    <?php if($header['width']): ?>
                                        style="width: <?php echo e($header['width']); ?>"
                                    <?php endif; ?>
                                >
                                    <?php echo e($header['label']); ?>

                                    <?php if($header['required']): ?>
                                        <span class="whitespace-nowrap">
                                            <sup class="font-medium text-danger-700 dark:text-danger-400">*</sup>
                                        </span>
                                    <?php endif; ?>
                                </th>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php if($hasActions): ?>
                                <th class="filament-table-repeater-header-column w-px ltr:rounded-tr-xl rtl:rounded-tl-xl p-2 bg-gray-100 dark:bg-gray-900/60">
                                    <div class="flex items-center gap-2 md:justify-center">
                                        <?php $__currentLoopData = $visibleExtraItemActions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $extraItemAction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="w-8"></div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                        <?php if($reorderAction->isVisible()): ?>
                                            <div class="w-8"></div>
                                        <?php endif; ?>

                                        <?php if($isReorderableWithButtons): ?>
                                            <?php if($moveUpAction && count($containers) > 2): ?>
                                                <div class="w-8"></div>
                                            <?php endif; ?>

                                            <?php if($moveDownAction && count($containers) > 2): ?>
                                                <div class="w-8"></div>
                                            <?php endif; ?>
                                        <?php endif; ?>

                                        <?php if($cloneAction->isVisible()): ?>
                                            <div class="w-8"></div>
                                        <?php endif; ?>

                                        <?php if($deleteAction->isVisible()): ?>
                                            <div class="w-8"></div>
                                        <?php endif; ?>

                                        <span class="sr-only">
                                            <?php echo e(__('filament-table-repeater::components.repeater.row_actions.label')); ?>

                                        </span>
                                    </div>
                                </th>
                            <?php endif; ?>
                        </tr>
                    </thead>
                    <tbody
                        x-sortable
                        wire:end.stop="<?php echo e('mountFormComponentAction(\'' . $statePath . '\', \'reorder\', { items: $event.target.sortable.toArray() })'); ?>"
                        class="filament-table-repeater-rows-wrapper divide-y divide-gray-950/5 dark:divide-white/20"
                    >
                        <?php if(count($containers)): ?>
                            <?php $__currentLoopData = $containers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $uuid => $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr
                                    wire:key="<?php echo e($this->getId()); ?>.<?php echo e($row->getStatePath()); ?>.<?php echo e($field::class); ?>.item"
                                    x-sortable-item="<?php echo e($uuid); ?>"
                                    class="filament-table-repeater-row md:divide-x md:divide-gray-950/5 dark:md:divide-white/20"
                                >
                                    <?php $__currentLoopData = $row->getComponents(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cell): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if(! $cell instanceof \Filament\Forms\Components\Hidden && ! $cell->isHidden()): ?>
                                            <td
                                                class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                                                    'filament-table-repeater-column p-2',
                                                    'has-hidden-label' => $cell->isLabelHidden(),
                                                ]); ?>"
                                                <?php
                                                    $cellKey = method_exists($cell, 'getName') ? $cell->getName() : $cell->getId();
                                                ?>
                                                <?php if(
                                                    $columnWidths &&
                                                    isset($columnWidths[$cellKey])
                                                ): ?>
                                                    style="width: <?php echo e($columnWidths[$cellKey]); ?>"
                                                <?php endif; ?>
                                            >
                                                <?php echo e($cell); ?>

                                            </td>
                                        <?php else: ?>
                                            <?php echo e($cell); ?>

                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    <?php if($hasActions): ?>
                                        <td class="filament-table-repeater-column p-2 w-px">
                                            <ul class="flex items-center gap-x-3 lg:justify-center">
                                                <?php $__currentLoopData = $visibleExtraItemActions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $extraItemAction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <li>
                                                        <?php echo e($extraItemAction(['item' => $uuid])); ?>

                                                    </li>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                <?php if($reorderAction->isVisible()): ?>
                                                    <li x-sortable-handle class="shrink-0">
                                                        <?php echo e($reorderAction); ?>

                                                    </li>
                                                <?php endif; ?>

                                                <?php if($isReorderableWithButtons): ?>
                                                    <?php if(! $loop->first): ?>
                                                        <li>
                                                        <?php echo e($moveUpAction(['item' => $uuid])); ?>

                                                        </li>
                                                    <?php endif; ?>

                                                    <?php if(! $loop->last): ?>
                                                        <li>
                                                        <?php echo e($moveDownAction(['item' => $uuid])); ?>

                                                        </li>
                                                    <?php endif; ?>
                                                <?php endif; ?>

                                                <?php if($cloneAction->isVisible()): ?>
                                                    <li>
                                                    <?php echo e($cloneAction(['item' => $uuid])); ?>

                                                    </li>
                                                <?php endif; ?>

                                                <?php if($deleteAction->isVisible()): ?>
                                                    <li>
                                                    <?php echo e($deleteAction(['item' => $uuid])); ?>

                                                    </li>
                                                <?php endif; ?>
                                            </ul>
                                        </td>
                                    <?php endif; ?>

                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php else: ?>
                            <tr class="filament-table-repeater-row filament-table-repeater-empty-row md:divide-x md:divide-gray-950/5 dark:md:divide-divide-white/20">
                                <td colspan="<?php echo e(count($headers) + intval($hasActions)); ?>" class="filament-table-repeater-column filament-table-repeater-empty-column p-4 w-px text-center italic">
                                    <?php echo e($emptyLabel ?: __('filament-table-repeater::components.repeater.empty.label')); ?>

                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        <?php endif; ?>

        <?php if($addAction->isVisible()): ?>
            <div class="relative flex justify-center">
                <?php echo e($addAction); ?>

            </div>
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
<?php /**PATH /var/www/Clients/ControlInternacionalInspector/vendor/awcodes/filament-table-repeater/resources/views/components/table-repeater.blade.php ENDPATH**/ ?>