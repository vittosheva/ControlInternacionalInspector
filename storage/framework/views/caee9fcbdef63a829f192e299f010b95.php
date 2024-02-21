<div class="<?php echo \Illuminate\Support\Arr::toCssClasses([
    'flex items-center justify-center min-h-screen bg-gray-100 text-gray-900 filament-login-page',
    'dark:bg-gray-900 dark:text-white' => config('filament.dark_mode'),
]); ?>">
    <div class="px-6 -mt-16 md:mt-0 md:px-2 max-w-md space-y-8 w-screen">
        <form wire:submit.prevent="login" class="<?php echo \Illuminate\Support\Arr::toCssClasses([
            'p-8 space-y-8 bg-white/50 backdrop-blur-xl border border-gray-200 shadow-2xl rounded-2xl relative',
            'dark:bg-gray-900/50 dark:border-gray-700' => config('filament.dark_mode'),
        ]); ?>">
            <div>
                <h2 class="font-bold tracking-tight text-center text-2xl">
                    <?php echo e(__('filament-lockscreen::default.heading')); ?>

                </h2>
            </div>
            <div class="flex flex-row justify-center">
                <img class="w-56 h-56 rounded-full" src="<?php echo e(\Filament\Facades\Filament::getUserAvatarUrl(\Filament\Facades\Filament::auth()->user())); ?>" alt="avatar">
            </div>

            <?php echo e($this->form); ?>


            <?php if (isset($component)) { $__componentOriginal6330f08526bbb3ce2a0da37da512a11f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal6330f08526bbb3ce2a0da37da512a11f = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'filament::components.button.index','data' => ['type' => 'submit','class' => 'w-full']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('filament::button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'submit','class' => 'w-full']); ?>
                <?php echo e(__('filament-lockscreen::default.button.submit_label')); ?>

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
        </form>
        <div class="text-center">
        <?php if (isset($component)) { $__componentOriginal549c94d872270b69c72bdf48cb183bc9 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal549c94d872270b69c72bdf48cb183bc9 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'filament::components.link','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('filament::link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
            <a class="text-primary-600 hover:text-primary-700"
               href="#!"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <?php echo e(__('filament-lockscreen::default.button.switch_account')); ?></a>
         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal549c94d872270b69c72bdf48cb183bc9)): ?>
<?php $attributes = $__attributesOriginal549c94d872270b69c72bdf48cb183bc9; ?>
<?php unset($__attributesOriginal549c94d872270b69c72bdf48cb183bc9); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal549c94d872270b69c72bdf48cb183bc9)): ?>
<?php $component = $__componentOriginal549c94d872270b69c72bdf48cb183bc9; ?>
<?php unset($__componentOriginal549c94d872270b69c72bdf48cb183bc9); ?>
<?php endif; ?>
            <form id="logout-form" action="<?php echo e(url(filament()->getLogoutUrl())); ?>" method="POST" style="display: none;">
                <?php echo e(csrf_field()); ?>

            </form>
        </div>
    </div>
    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('notifications');

$__html = app('livewire')->mount($__name, $__params, 'lw-2375477003-0', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
</div>
<?php /**PATH /Users/vittoriodormi/Desktop/VITTOSHEVA/GitHub/LARAVEL/Clients/ControlInternacionalInspector/vendor/marjose123/filament-lockscreen/resources/views/livewire/locker-screen.blade.php ENDPATH**/ ?>