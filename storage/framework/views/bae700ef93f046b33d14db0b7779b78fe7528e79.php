  
<?php $__env->startSection('content'); ?>
<div>
    <a href="<?php echo e(route('superpowers.index')); ?>"> Tornar</a>
</div>
<div>
    <h2>Actualitzar Superpoder</h2>
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
<form action="<?php echo e(route('superpowers.update',$superpower)); ?>" method="POST">
    <?php echo csrf_field(); ?>
  
    <div>
        <strong>Description:</strong>
        <input type="text" name="description" value="<?php echo e(old('description', $superpower->description)); ?>">
    </div>     
        
    <div>
        <input type="submit" value="Desar">
    </div>
    
</form>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('plantilla', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/usuari/projectes/Superherois/resources/views/superpowers/update.blade.php ENDPATH**/ ?>