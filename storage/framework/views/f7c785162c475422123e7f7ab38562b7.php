<p>Estimado(a) <strong><br><?php echo e($persona); ?></strong>,</p>
<p>Nos complace informarle sobre la <?php echo e($documentName); ?>: <?php echo e(idNumberFormat($documentNumber, $documentCode, true, '-')); ?></p>
<p>Adjunto encontrará su documento.</p>
<p>Gracias por preferirnos.</p>
<p>Atentamente,<br><br><strong><?php echo e($companyName); ?></strong><br><?php echo e($companyRuc); ?><br></p>
<?php /**PATH /var/www/Clients/ControlInternacionalInspector/resources/views/emails/basic-document.blade.php ENDPATH**/ ?>