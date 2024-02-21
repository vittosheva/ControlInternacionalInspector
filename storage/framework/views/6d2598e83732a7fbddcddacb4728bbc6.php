<?php if (isset($component)) { $__componentOriginala86dcd7e3fb4428c61bb5e13aa161d28 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala86dcd7e3fb4428c61bb5e13aa161d28 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'filament-forms::components.field-wrapper.index','data' => ['id' => $getId(),'label' => $getLabel(),'labelSrOnly' => $isLabelHidden(),'helperText' => $getHelperText(),'hint' => $getHint(),'hintIcon' => $getHintIcon(),'required' => $isRequired(),'statePath' => $getStatePath()]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('filament-forms::field-wrapper'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($getId()),'label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($getLabel()),'label-sr-only' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($isLabelHidden()),'helper-text' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($getHelperText()),'hint' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($getHint()),'hint-icon' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($getHintIcon()),'required' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($isRequired()),'state-path' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($getStatePath())]); ?>
    <div class="w-full" x-data="{
            state: $wire.entangle('<?php echo e($getStatePath()); ?>'),
        }"
         x-init="$nextTick(() => {
            const options = {
                modes: <?php echo e($getModes()); ?>,
                history: true,
                onChange: function(){
                },
                onChangeJSON: function(json){
                    state=JSON.stringify(json);
                },
                onChangeText: function(jsonString){
                    state=jsonString;
                },
                onValidationError: function (errors) {
                    errors.forEach((error) => {
                      switch (error.type) {
                        case 'validation': // schema validation error
                          break;
                        case 'error':  // json parse error
                            console.log(error.message);
                          break;
                      }
                    })
                }
            };
            if(typeof json_editor !== 'undefined'){
                json_editor = new JSONEditor($refs.editor, options);
                json_editor.set(state);
            } else {
                let json_editor = new JSONEditor($refs.editor, options);
                json_editor.set(state);
            }
         })"
         x-cloak
         wire:ignore>
            <div x-ref="editor" class="w-full ace_editor"
                 style="min-height: 30vh;height:<?php echo e($getHeight()); ?>px"></div>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala86dcd7e3fb4428c61bb5e13aa161d28)): ?>
<?php $attributes = $__attributesOriginala86dcd7e3fb4428c61bb5e13aa161d28; ?>
<?php unset($__attributesOriginala86dcd7e3fb4428c61bb5e13aa161d28); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala86dcd7e3fb4428c61bb5e13aa161d28)): ?>
<?php $component = $__componentOriginala86dcd7e3fb4428c61bb5e13aa161d28; ?>
<?php unset($__componentOriginala86dcd7e3fb4428c61bb5e13aa161d28); ?>
<?php endif; ?>

<?php /**PATH /Users/vittoriodormi/Desktop/VITTOSHEVA/GitHub/LARAVEL/Clients/ControlInternacionalInspector/vendor/invaders-xx/filament-jsoneditor/resources/views/json-editor.blade.php ENDPATH**/ ?>