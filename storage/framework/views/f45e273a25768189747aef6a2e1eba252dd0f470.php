<?php $__env->startSection('content'); ?>
<a href="<?php echo e(route('superpowers.index')); ?>">Tornar</a>

<h2>Superpower</h2>
            
<div>
<strong>Description:</strong>
<?php echo e($superpower->description); ?>

</div>
        

<div>
<strong>Superherois amb aquest poder:</strong>
<ul>
   <?php $__currentLoopData = $superpower->superheroes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $superhero): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
     	<li>
            <?php echo e($superhero->heroname); ?> 
            </li>
   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</ul>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('plantilla', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/usuari/projectes/Superherois/resources/views/superpowers/show.blade.php ENDPATH**/ ?>