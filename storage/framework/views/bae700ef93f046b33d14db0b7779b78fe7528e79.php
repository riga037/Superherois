<?php $__env->startSection('content'); ?>

Actualitzar Superpoder
<br><br>
<form method="POST" action="/update/<?php echo e($poder->id); ?>">
	
	<?php echo csrf_field(); ?>
	<input type="text" name="description" value="<?php echo e(old('description',$poder->description)); ?>">
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
<?php echo $__env->make('plantilla', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/usuari/projectes/Superherois/resources/views/superpowers/update.blade.php ENDPATH**/ ?>