  
<?php $__env->startSection('content'); ?>
<div>
    <a href="<?php echo e(route('superheroes.index')); ?>"> Tornar</a>
</div>
<div>
    <h2>Afegir Nou Superheroi</h2>
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
<form action="<?php echo e(route('superheroes.store')); ?>" method="POST">
    <?php echo csrf_field(); ?>
  
    <div>
        <strong>Real Name:</strong>
        <input type="text" name="realname" value="<?php echo e(old('realname')); ?>">
    </div>
        
    <div>           
        <strong>Hero Name:</strong>
        <input type="text" name="heroname" value="<?php echo e(old('heroname')); ?>">
    </div>
        
    <div>
        <strong>Gender:</strong>
        <select name="gender">
            <option value="male" <?php echo e(old('gender') == 'male' ? 'selected' : ''); ?>>Male</option>
                    <option value="female" <?php echo e(old('gender') == 'female' ? 'selected' : ''); ?>>Female</option>
        </select>
    </div>
        
    <div>           
        <strong>Planet:</strong>
        <select name="planet_id">
            <?php $__currentLoopData = $planets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $planet): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($planet->id); ?>" <?php echo e(old('planet_id') == $planet->id ? 'selected' : ''); ?> >
                            <?php echo e($planet->name); ?>

                        </option>       
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>            
        </select>
    </div>
        
        
    <div>
        <input type="submit" value="Desar">
    </div>
    
</form>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('plantilla', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/usuari/projectes/Superherois/resources/views/superheroes/new.blade.php ENDPATH**/ ?>