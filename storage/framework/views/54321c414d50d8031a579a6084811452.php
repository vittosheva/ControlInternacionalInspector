<?php
    $datalistOptions = $getDatalistOptions();
    $extraAlpineAttributes = $getExtraAlpineAttributes();
    $id = $getId();
    $isConcealed = $isConcealed();
    $isDisabled = $isDisabled();
    $isPrefixInline = $isPrefixInline();
    $isSuffixInline = $isSuffixInline();
    $mask = $getMask();
    $prefixActions = $getPrefixActions();
    $prefixIcon = $getPrefixIcon();
    $prefixLabel = $getPrefixLabel();
    $suffixActions = $getSuffixActions();
    $suffixIcon = $getSuffixIcon();
    $suffixLabel = $getSuffixLabel();
    $statePath = $getStatePath();

$stylecode = '';
    $x = 0;
    if ($isRevealable() || $isGeneratable() || $isCopyable())
     {
        $x += $isRevealable() ? 2 : 0;
        $x += $isGeneratable() ? 2 : 0;
        $x += $isCopyable() ? 2 : 0;
        $stylecode = 'isRtl ? \'padding-left: '.$x.'rem\' : \'padding-right: '.$x.'rem\'';
     }

    $generatePassword = '
                    let chars = \''. $getPasswChars().'\';
                    let minLen = '. $getPasswLength(). ';


                    let password = [];
                    while(password.length <= minLen){
                        password.push(chars.charAt(Math.floor(Math.random() * 26)));
                        password.push(chars.charAt(Math.floor(Math.random() * 26) +26));
                        if(chars.length > 52 && password.length > 4){
                            password.push(chars.charAt(Math.floor(Math.random() * 10) +52));
                        }
                        if(chars.length > 62 && password.length > 4){
                            password.push(chars.charAt(Math.floor(Math.random() * 10) +62));
                        }
                    }
                    password = password.slice(0, minLen).sort(() => Math.random() - 0.5).join(\'\')

                    $wire.set(\'' . $getStatePath() . '\', password);
                ';
        if($shouldNotifyOnGenerate()){
            $generatePassword .= 'new FilamentNotification()
                            .title(\'' . $getGenerateText() . '\')
                            .seconds(3)
                            .success()
                            .send();';
        }

    $copyPassword = ' copyPassword: function() {
                    navigator.clipboard.writeText( $wire.get(\'' . $getStatePath() . '\'));
                    ';
                    if($shouldNotifyOnCopy() || true) {
                       $copyPassword .= "new FilamentNotification()
                            .title('" . $getCopyText() . "')
                            .seconds(3)
                            .success()
                            .send();";
                    }
                $copyPassword .= '}';

    $xdata = '{ show: true,
            isRtl: false,
            generatePasswd: function() {

                ' . $generatePassword . '
                },
                ' . $copyPassword . '
                }';
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
    <?php if (isset($component)) { $__componentOriginal505efd9768415fdb4543e8c564dad437 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal505efd9768415fdb4543e8c564dad437 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'filament::components.input.wrapper','data' => ['disabled' => $isDisabled,'inlinePrefix' => $isPrefixInline,'inlineSuffix' => $isSuffixInline,'prefix' => $prefixLabel,'prefixActions' => $prefixActions,'prefixIcon' => $prefixIcon,'suffix' => $suffixLabel,'suffixActions' => $suffixActions,'suffixIcon' => $suffixIcon,'valid' => ! $errors->has($statePath),'class' => 'fi-fo-text-input','attributes' => 
            \Filament\Support\prepare_inherited_attributes($getExtraAttributeBag())
                ->class(['overflow-hidden relative'])
        ,'xData' => ''.e($xdata).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('filament::input.wrapper'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['disabled' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($isDisabled),'inline-prefix' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($isPrefixInline),'inline-suffix' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($isSuffixInline),'prefix' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($prefixLabel),'prefix-actions' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($prefixActions),'prefix-icon' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($prefixIcon),'suffix' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($suffixLabel),'suffix-actions' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($suffixActions),'suffix-icon' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($suffixIcon),'valid' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(! $errors->has($statePath)),'class' => 'fi-fo-text-input','attributes' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(
            \Filament\Support\prepare_inherited_attributes($getExtraAttributeBag())
                ->class(['overflow-hidden relative'])
        ),'x-data' => ''.e($xdata).'']); ?>
        <?php if (isset($component)) { $__componentOriginal9ad6b66c56a2379ee0ba04e1e358c61e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9ad6b66c56a2379ee0ba04e1e358c61e = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'filament::components.input.index','data' => ['attributes' => 
                \Filament\Support\prepare_inherited_attributes($getExtraInputAttributeBag())
                    ->merge($extraAlpineAttributes, escape: false)
                    ->merge([
                        'autocapitalize' => $getAutocapitalize(),
                        'autocomplete' => $getAutocomplete(),
                        'autofocus' => $isAutofocused(),
                        'disabled' => $isDisabled,
                        'id' => $id,
                        'inlinePrefix' => $isPrefixInline && (count($prefixActions) || $prefixIcon || filled($prefixLabel)),
                        'inlineSuffix' => true,
                        'inputmode' => $getInputMode(),
                        'list' => $datalistOptions ? $id . '-list' : null,
                        'max' => (! $isConcealed) ? $getMaxValue() : null,
                        'maxlength' => (! $isConcealed) ? $getMaxLength() : null,
                        'min' => (! $isConcealed) ? $getMinValue() : null,
                        'minlength' => (! $isConcealed) ? $getMinLength() : null,
                        'placeholder' => $getPlaceholder(),
                        'readonly' => $isReadOnly(),
                        'required' => $isRequired() && (! $isConcealed),
                        'step' => $getStep(),
                        ':type' => 'show ? \'password\' : \'text\'',
                        ':style' => $stylecode,
                        $applyStateBindingModifiers('wire:model') => $statePath,
                        'x-data' => (count($extraAlpineAttributes) || filled($mask)) ? '{}' : null,
                        'x-mask' . ($mask instanceof \Filament\Support\RawJs ? ':dynamic' : '') => filled($mask) ? $mask : null,
                    ], escape: false)

            ,'xInit' => '$nextTick(() => { isRtl = document.documentElement.dir === \'rtl\' })','xRef' => ''.e($getXRef()).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('filament::input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['attributes' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(
                \Filament\Support\prepare_inherited_attributes($getExtraInputAttributeBag())
                    ->merge($extraAlpineAttributes, escape: false)
                    ->merge([
                        'autocapitalize' => $getAutocapitalize(),
                        'autocomplete' => $getAutocomplete(),
                        'autofocus' => $isAutofocused(),
                        'disabled' => $isDisabled,
                        'id' => $id,
                        'inlinePrefix' => $isPrefixInline && (count($prefixActions) || $prefixIcon || filled($prefixLabel)),
                        'inlineSuffix' => true,
                        'inputmode' => $getInputMode(),
                        'list' => $datalistOptions ? $id . '-list' : null,
                        'max' => (! $isConcealed) ? $getMaxValue() : null,
                        'maxlength' => (! $isConcealed) ? $getMaxLength() : null,
                        'min' => (! $isConcealed) ? $getMinValue() : null,
                        'minlength' => (! $isConcealed) ? $getMinLength() : null,
                        'placeholder' => $getPlaceholder(),
                        'readonly' => $isReadOnly(),
                        'required' => $isRequired() && (! $isConcealed),
                        'step' => $getStep(),
                        ':type' => 'show ? \'password\' : \'text\'',
                        ':style' => $stylecode,
                        $applyStateBindingModifiers('wire:model') => $statePath,
                        'x-data' => (count($extraAlpineAttributes) || filled($mask)) ? '{}' : null,
                        'x-mask' . ($mask instanceof \Filament\Support\RawJs ? ':dynamic' : '') => filled($mask) ? $mask : null,
                    ], escape: false)

            ),'x-init' => '$nextTick(() => { isRtl = document.documentElement.dir === \'rtl\' })','x-ref' => ''.e($getXRef()).'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ad6b66c56a2379ee0ba04e1e358c61e)): ?>
<?php $attributes = $__attributesOriginal9ad6b66c56a2379ee0ba04e1e358c61e; ?>
<?php unset($__attributesOriginal9ad6b66c56a2379ee0ba04e1e358c61e); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ad6b66c56a2379ee0ba04e1e358c61e)): ?>
<?php $component = $__componentOriginal9ad6b66c56a2379ee0ba04e1e358c61e; ?>
<?php unset($__componentOriginal9ad6b66c56a2379ee0ba04e1e358c61e); ?>
<?php endif; ?>

        <?php if($isRevealable() || $isGeneratable() || $isCopyable()): ?>

<div
            class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                'flex items-center gap-x-1 pe-1',
                'ps-1',
                'border-s border-gray-200 ps-1 dark:border-white/10',
                'absolute top-0  height-100'
            ]); ?>"
            :style="isRtl ? 'left:0;height:100%' : 'right:0;height:100%'"
        >
        <?php if($isRevealable()): ?>
        <button type="button" class="flex hidden inset-y-0 right-0 justify-self-end items-center p-1 text-gray-400 hover:text-gray-700 dark:hover:text-gray-200" @click="show = !show" :class="{'hidden': !show, 'block': show }">
             <?php echo e(svg($getShowIcon(), "w-5 h-5")); ?>

        </button>
        <button type="button" class="flex hidden inset-y-0 right-0 items-center p-1 text-gray-400 hover:text-gray-700 dark:hover:text-gray-200" @click="show = !show" :class="{'block': !show, 'hidden': show }">
              <?php echo e(svg($getHideIcon(), "w-5 h-5")); ?>

        </button>
        <?php endif; ?>
         <?php if($isGeneratable()): ?>
                    <button
                        type="button"
                        x-on:click.prevent="generatePasswd()"
                        class="text-gray-400 hover:text-gray-700 dark:hover:text-gray-200 p-1"
                    >
                       <?php echo e(svg($getGenerateIcon(), "w-5 h-5")); ?>


                    </button>
                <?php endif; ?>

                <?php if($isCopyable()): ?>
                    <button
                        type="button"
                        x-on:click.prevent="copyPassword()"
                        class="text-gray-400 hover:text-gray-700 dark:hover:text-gray-200 p-1"
                    >
                      <?php echo e(svg($getCopyIcon(), "w-5 h-5")); ?>


                    </button>
                <?php endif; ?>
</div>
                <?php endif; ?>

     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal505efd9768415fdb4543e8c564dad437)): ?>
<?php $attributes = $__attributesOriginal505efd9768415fdb4543e8c564dad437; ?>
<?php unset($__attributesOriginal505efd9768415fdb4543e8c564dad437); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal505efd9768415fdb4543e8c564dad437)): ?>
<?php $component = $__componentOriginal505efd9768415fdb4543e8c564dad437; ?>
<?php unset($__componentOriginal505efd9768415fdb4543e8c564dad437); ?>
<?php endif; ?>

    <?php if($datalistOptions): ?>
        <datalist id="<?php echo e($id); ?>-list">
            <?php $__currentLoopData = $datalistOptions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($option); ?>" />
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </datalist>
    <?php endif; ?>
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
<?php /**PATH /Users/vittoriodormi/Desktop/VITTOSHEVA/GitHub/LARAVEL/Clients/ControlInternacionalInspector/vendor/phpsa/filament-password-reveal/src/../resources/views/password.blade.php ENDPATH**/ ?>