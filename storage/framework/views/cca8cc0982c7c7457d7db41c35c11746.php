<div>
    <?php if(filled($key = $getKey())): ?>
        <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split($getComponent(), $getComponentProperties());

$__html = app('livewire')->mount($__name, $__params, $key, $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
    <?php else: ?>
        <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split($getComponent(), $getComponentProperties());

$__html = app('livewire')->mount($__name, $__params, 'lw-2816742393-0', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
    <?php endif; ?>
</div>
<?php /**PATH /var/www/Clients/ControlInternacionalInspector/vendor/filament/forms/src/../resources/views/components/livewire.blade.php ENDPATH**/ ?>