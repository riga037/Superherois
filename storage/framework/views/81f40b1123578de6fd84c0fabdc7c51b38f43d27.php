<?php $__env->startSection('content'); ?>

Llista Superpoders <a href="/formnew">Nou Superpoder</a>
<br>
<table border=1>
	<tr>
		<td>ID</td>
		<td>Description</td>
		<td>Created At</td>
		<td>Operacions</td>
	</tr>
	<?php $__currentLoopData = $poders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $poder): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	<tr>
		<td><?php echo e($poder->id); ?></td>
		<td><?php echo e($poder->description); ?></td>
		<td><?php echo e($poder->created_at); ?></td>
		<td><a href="/delete/<?php echo e($poder->id); ?>">Esborrar</a></td>
		<td><a href="/update/<?php echo e($poder->id); ?>">Actualitzar</a></td>
	</tr>
	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</table>

<?php echo e($poders->links('pagination::bootstrap-4')); ?>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('plantilla', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/usuari/projectes/superherois-laravel/resources/views/superpowers/index.blade.php ENDPATH**/ ?>