<?php $__env->startSection('content'); ?>

Llista Superherois <a href="/formnewsuperhero">Nou Superheroi</a>
<br>
<table border=1>
	<tr>
		<td>ID</td>
		<td>Real Name</td>
		<td>Hero Name</td>
		<td>Gender</td>
		<td>Planet</td>
		<td>Created At</td>
		<td>Operacions</td>
	</tr>
	<?php $__currentLoopData = $superherois; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $superheroi): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	<tr>
		<td><?php echo e($superheroi->id); ?></td>
		<td><?php echo e($superheroi->realname); ?></td>
		<td><?php echo e($superheroi->heroname); ?></td>
		<td><?php echo e($superheroi->gender); ?></td>
		<td><?php echo e($superheroi->planet_id); ?></td>
		<td><?php echo e($superheroi->created_at); ?></td>
		<td><a href="/delete/<?php echo e($superheroi->id); ?>">Esborrar</a></td>
		<td><a href="/update/<?php echo e($superheroi->id); ?>">Actualitzar</a></td>
	</tr>
	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</table>

<?php echo e($superherois->links('pagination::bootstrap-4')); ?>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('plantilla', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/usuari/projectes/superherois-laravel/resources/views/superheroes/index.blade.php ENDPATH**/ ?>