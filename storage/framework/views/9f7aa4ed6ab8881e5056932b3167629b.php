<div>
    <p>Estimado(a) <?php echo e($personaName); ?>,</p>
    <p>Para poder recibir documentos de facturación electrónica de la compañía <?php echo e($company); ?>, debe dar click en la siguiente invitación:</p>
    <p>
        <a href="<?php echo e(config('telegram.bots.DorsiSoftBot.bot_url')); ?>"><?php echo e(config('telegram.default')); ?></a>
    </p>
</div>
<?php /**PATH /var/www/Clients/ControlInternacionalInspector/resources/views/emails/telegram-invitation.blade.php ENDPATH**/ ?>