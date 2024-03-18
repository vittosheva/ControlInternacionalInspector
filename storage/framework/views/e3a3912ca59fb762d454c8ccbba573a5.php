<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps([
    'action' => null,
    'alignment' => null,
    'entry' => null,
    'hasInlineLabel' => null,
    'helperText' => null,
    'hint' => null,
    'hintActions' => null,
    'hintColor' => null,
    'hintIcon' => null,
    'hintIconTooltip' => null,
    'id' => null,
    'label' => null,
    'labelPrefix' => null,
    'labelSrOnly' => null,
    'labelSuffix' => null,
    'shouldOpenUrlInNewTab' => null,
    'statePath' => null,
    'tooltip' => null,
    'url' => null,
]) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps([
    'action' => null,
    'alignment' => null,
    'entry' => null,
    'hasInlineLabel' => null,
    'helperText' => null,
    'hint' => null,
    'hintActions' => null,
    'hintColor' => null,
    'hintIcon' => null,
    'hintIconTooltip' => null,
    'id' => null,
    'label' => null,
    'labelPrefix' => null,
    'labelSrOnly' => null,
    'labelSuffix' => null,
    'shouldOpenUrlInNewTab' => null,
    'statePath' => null,
    'tooltip' => null,
    'url' => null,
]); ?>
<?php foreach (array_filter(([
    'action' => null,
    'alignment' => null,
    'entry' => null,
    'hasInlineLabel' => null,
    'helperText' => null,
    'hint' => null,
    'hintActions' => null,
    'hintColor' => null,
    'hintIcon' => null,
    'hintIconTooltip' => null,
    'id' => null,
    'label' => null,
    'labelPrefix' => null,
    'labelSrOnly' => null,
    'labelSuffix' => null,
    'shouldOpenUrlInNewTab' => null,
    'statePath' => null,
    'tooltip' => null,
    'url' => null,
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<?php
    use Filament\Support\Enums\Alignment;

    if ($entry) {
        $action ??= $entry->getAction();
        $alignment ??= $entry->getAlignment();
        $hasInlineLabel ??= $entry->hasInlineLabel();
        $helperText ??= $entry->getHelperText();
        $hint ??= $entry->getHint();
        $hintActions ??= $entry->getHintActions();
        $hintColor ??= $entry->getHintColor();
        $hintIcon ??= $entry->getHintIcon();
        $hintIconTooltip ??= $entry->getHintIconTooltip();
        $id ??= $entry->getId();
        $label ??= $entry->getLabel();
        $labelSrOnly ??= $entry->isLabelHidden();
        $shouldOpenUrlInNewTab ??= $entry->shouldOpenUrlInNewTab();
        $statePath ??= $entry->getStatePath();
        $tooltip ??= $entry->getTooltip();
        $url ??= $entry->getUrl();
    }

    if (! $alignment instanceof Alignment) {
        $alignment = filled($alignment) ? (Alignment::tryFrom($alignment) ?? $alignment) : null;
    }

    $hintActions = array_filter(
        $hintActions ?? [],
        fn (\Filament\Infolists\Components\Actions\Action $hintAction): bool => $hintAction->isVisible(),
    );
?>

<div <?php echo e($attributes->class(['fi-in-entry-wrp'])); ?>>
    <?php if($label && $labelSrOnly): ?>
        <dt class="sr-only">
            <?php echo e($label); ?>

        </dt>
    <?php endif; ?>

    <div
        class="<?php echo \Illuminate\Support\Arr::toCssClasses([
            'grid gap-y-2',
            'sm:grid-cols-3 sm:items-start sm:gap-x-4' => $hasInlineLabel,
        ]); ?>"
    >
        <?php if(($label && (! $labelSrOnly)) || $labelPrefix || $labelSuffix || filled($hint) || $hintIcon): ?>
            <div class="flex items-center justify-between gap-x-3">
                <?php if($label && (! $labelSrOnly)): ?>
                    <?php if (isset($component)) { $__componentOriginalfccc0df05cc66fe3fb846bd7ea93f9df = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalfccc0df05cc66fe3fb846bd7ea93f9df = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'filament-infolists::components.entry-wrapper.label','data' => ['prefix' => $labelPrefix,'suffix' => $labelSuffix]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('filament-infolists::entry-wrapper.label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['prefix' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($labelPrefix),'suffix' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($labelSuffix)]); ?>
                        <?php echo e($label); ?>

                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalfccc0df05cc66fe3fb846bd7ea93f9df)): ?>
<?php $attributes = $__attributesOriginalfccc0df05cc66fe3fb846bd7ea93f9df; ?>
<?php unset($__attributesOriginalfccc0df05cc66fe3fb846bd7ea93f9df); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalfccc0df05cc66fe3fb846bd7ea93f9df)): ?>
<?php $component = $__componentOriginalfccc0df05cc66fe3fb846bd7ea93f9df; ?>
<?php unset($__componentOriginalfccc0df05cc66fe3fb846bd7ea93f9df); ?>
<?php endif; ?>
                <?php elseif($labelPrefix): ?>
                    <?php echo e($labelPrefix); ?>

                <?php elseif($labelSuffix): ?>
                    <?php echo e($labelSuffix); ?>

                <?php endif; ?>

                <?php if(filled($hint) || $hintIcon || count($hintActions)): ?>
                    <?php if (isset($component)) { $__componentOriginalac45e35131ef0224834cf5d158196d88 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalac45e35131ef0224834cf5d158196d88 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'filament-infolists::components.entry-wrapper.hint','data' => ['actions' => $hintActions,'color' => $hintColor,'icon' => $hintIcon,'tooltip' => $hintIconTooltip]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('filament-infolists::entry-wrapper.hint'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['actions' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($hintActions),'color' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($hintColor),'icon' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($hintIcon),'tooltip' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($hintIconTooltip)]); ?>
                        <?php echo e($hint); ?>

                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalac45e35131ef0224834cf5d158196d88)): ?>
<?php $attributes = $__attributesOriginalac45e35131ef0224834cf5d158196d88; ?>
<?php unset($__attributesOriginalac45e35131ef0224834cf5d158196d88); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalac45e35131ef0224834cf5d158196d88)): ?>
<?php $component = $__componentOriginalac45e35131ef0224834cf5d158196d88; ?>
<?php unset($__componentOriginalac45e35131ef0224834cf5d158196d88); ?>
<?php endif; ?>
                <?php endif; ?>
            </div>
        <?php endif; ?>

        <div
            class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                'grid gap-y-2',
                'sm:col-span-2' => $hasInlineLabel,
            ]); ?>"
        >
            <dd
                <?php if(filled($tooltip)): ?>
                    x-data="{}"
                    x-tooltip="{
                        content: <?php echo \Illuminate\Support\Js::from($tooltip)->toHtml() ?>,
                        theme: $store.theme,
                    }"
                <?php endif; ?>
                class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                    match ($alignment) {
                        Alignment::Start => 'text-start',
                        Alignment::Center => 'text-center',
                        Alignment::End => 'text-end',
                        Alignment::Justify, Alignment::Between => 'text-justify',
                        Alignment::Left => 'text-left',
                        Alignment::Right => 'text-right',
                        default => $alignment,
                    },
                ]); ?>"
            >
                <?php if($url): ?>
                    <a
                        <?php echo e(\Filament\Support\generate_href_html($url, $shouldOpenUrlInNewTab)); ?>

                        class="block"
                    >
                        <?php echo e($slot); ?>

                    </a>
                <?php elseif($action): ?>
                    <?php
                        $wireClickAction = $action->getLivewireClickHandler();
                    ?>

                    <button
                        type="button"
                        wire:click="<?php echo e($wireClickAction); ?>"
                        wire:loading.attr="disabled"
                        wire:target="<?php echo e($wireClickAction); ?>"
                        class="block"
                    >
                        <?php echo e($slot); ?>

                    </button>
                <?php else: ?>
                    <?php echo e($slot); ?>

                <?php endif; ?>
            </dd>

            <?php if(filled($helperText)): ?>
                <?php if (isset($component)) { $__componentOriginal382c9a3a5ce137e9c7ffa56b700ac7ed = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal382c9a3a5ce137e9c7ffa56b700ac7ed = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'filament-infolists::components.entry-wrapper.helper-text','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('filament-infolists::entry-wrapper.helper-text'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                    <?php echo e($helperText); ?>

                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal382c9a3a5ce137e9c7ffa56b700ac7ed)): ?>
<?php $attributes = $__attributesOriginal382c9a3a5ce137e9c7ffa56b700ac7ed; ?>
<?php unset($__attributesOriginal382c9a3a5ce137e9c7ffa56b700ac7ed); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal382c9a3a5ce137e9c7ffa56b700ac7ed)): ?>
<?php $component = $__componentOriginal382c9a3a5ce137e9c7ffa56b700ac7ed; ?>
<?php unset($__componentOriginal382c9a3a5ce137e9c7ffa56b700ac7ed); ?>
<?php endif; ?>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php /**PATH /var/www/Clients/ControlInternacionalInspector/vendor/filament/infolists/resources/views/components/entry-wrapper/index.blade.php ENDPATH**/ ?>