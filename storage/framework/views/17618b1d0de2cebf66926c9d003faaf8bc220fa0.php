<?php $__env->startSection('content'); ?>
<a href="<?php echo e(route('superpowers.index')); ?>"> Tornar</a>

<h2>Fitxa Planeta</h2>
<br><br>
<b>Name:</b> <?php echo e($planet->name); ?></b><br><br>
<b>Herois Il·lustres:</b><br>

<?php $__currentLoopData = $planet->superheroes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $super): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <li><?php echo e($super->heroname); ?></li>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('plantilla', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/usuari/projectes/Superherois/resources/views/planets/show.blade.php ENDPATH**/ ?>