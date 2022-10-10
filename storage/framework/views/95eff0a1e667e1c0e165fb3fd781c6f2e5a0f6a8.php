<?php $__env->startSection('content'); ?>

Nou Superheroi
<br><br>
<form method="POST" action="/save">
	
	<?php echo csrf_field(); ?>
	Real Name <input type="text" name="realname" value="<?php echo e(old('realname')); ?>"><br><br>
	Hero Name <input type="text" name="heroname" value="<?php echo e(old('heroname')); ?>"><br><br>
	Gender <input type="text" name="gender" value="<?php echo e(old('gender')); ?>"><br><br>
	Planet ID <input type="number" name="planet_id" value="<?php echo e(old('planet_id')); ?>"><br><br>	
	<input type="submit" name="Desar">

</form>

<?php if($errors->any()): ?>

	<ul>
		<?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<li><?php echo e($error); ?></li>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	</ul>
<?php endif; ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('plantilla', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/usuari/projectes/superherois-laravel/resources/views/superheroes/new.blade.php ENDPATH**/ ?>