<?php $__env->startSection('content'); ?>

Actualitzar Superheroi
<br><br>
<form method="POST" action="/updatesuperhero/<?php echo e($superheroi->id); ?>">
	
	<?php echo csrf_field(); ?>
	Real Name <input type="text" name="realname" value="<?php echo e(old('realname',$superheroi->realname)); ?>"><br><br>
	Hero Name <input type="text" name="heroname" value="<?php echo e(old('heroname',$superheroi->heroname)); ?>"><br><br>
	Gender <input type="text" name="gender" value="<?php echo e(old('gender',$superheroi->gender)); ?>"><br><br>
	Planet ID <input type="number" name="planet_id" value="<?php echo e(old('planet_id',$superheroi->planet_id)); ?>"><br><br>	
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
<?php echo $__env->make('plantilla', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/usuari/projectes/Superherois/resources/views/superheroes/update.blade.php ENDPATH**/ ?>