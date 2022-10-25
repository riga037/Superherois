  
<?php $__env->startSection('content'); ?>
<div>
    <a href="<?php echo e(route('planets.index')); ?>"> Tornar</a>
</div>
<div>
    <h2>Actualitzar Planeta</h2>
</div>
    
   
<?php if($errors->any()): ?>
    <div class="alert alert-danger">
        <ul>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
<?php endif; ?>
   
<div>
<form action="<?php echo e(route('planets.update',$planet)); ?>" method="POST">
    <?php echo csrf_field(); ?>
  
    <div>
        <strong>Name:</strong>
        <input type="text" name="name" value="<?php echo e(old('name', $planet->name)); ?>">
    </div>     
        
    <div>
        <input type="submit" value="Desar">
    </div>
    
</form>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('plantilla', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/usuari/projectes/Superherois/resources/views/planets/update.blade.php ENDPATH**/ ?>