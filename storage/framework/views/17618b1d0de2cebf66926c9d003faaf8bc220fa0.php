  
<?php $__env->startSection('content'); ?>
<a href="<?php echo e(route('planets.index')); ?>"> Tornar</a>

<h2>Fitxa Planeta</h2>

    <div>
        <strong>Planet name:</strong>
        <?php echo e($planet->name); ?>

    </div>

    <div>
        <strong>Herois il·lustres:</strong>
        <?php $__currentLoopData = $planet->superheroes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $superhero): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li><?php echo e($superhero->heroname); ?></li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('plantilla', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/usuari/projectes/Superherois/resources/views/planets/show.blade.php ENDPATH**/ ?>