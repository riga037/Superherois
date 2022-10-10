<?php $__env->startSection('content'); ?>

Llista Planetes <a href="/formnewplanet">Nou Planeta</a>
<br>
<table border=1>
	<tr>
		<td>ID</td>
		<td>Name</td>
		<td>Created At</td>
		<td>Operacions</td>
	</tr>
	<?php $__currentLoopData = $planetes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $planeta): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	<tr>
		<td><?php echo e($planeta->id); ?></td>
		<td><?php echo e($planeta->name); ?></td>
		<td><?php echo e($planeta->created_at); ?></td>
		<td><a href="/deleteplanet/<?php echo e($planeta->id); ?>">Esborrar</a></td>
		<td><a href="/updateplanet/<?php echo e($planeta->id); ?>">Actualitzar</a></td>
	</tr>
	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</table>

<?php echo e($planetes->links('pagination::bootstrap-4')); ?>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('plantilla', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/usuari/projectes/superherois-laravel/resources/views/planets/index.blade.php ENDPATH**/ ?>