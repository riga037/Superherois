<?php $__env->startSection('content'); ?>

Actualitzar Superheroi
<br><br>
<form method="POST" action="/updatesuperhero/<?php echo e($superheroi->id); ?>">
	
	<?php echo csrf_field(); ?>
	Real Name <input type="text" name="realname" value="<?php echo e(old('realname',$superheroi->realname)); ?>"><br><br>
	Hero Name <input type="text" name="heroname" value="<?php echo e(old('heroname',$superheroi->heroname)); ?>"><br><br>
	Gender <select name="gender" id="gender">
		<option value="male" <?php if( old('gender') == "male"): ?> selected <?php endif; ?> >Male</option>
		<option value="female" <?php if( old('gender',$superheroi->gender) == "female"): ?> selected <?php endif; ?> >Female</option>
	</select><br><br>
  	
	Planet <select name="planet_id" id="planet_id">
  		<?php $__currentLoopData = $planetes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $planeta): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

		<option value="<?php echo e($planeta->id); ?>" <?php if(old('id',$planeta->id) == $planeta->id): ?> selected <?php endif; ?> ><?php echo e($planeta->name); ?></option>
  		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	</select><br><br>	
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