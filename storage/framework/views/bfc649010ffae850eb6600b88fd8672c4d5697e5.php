<?php $__env->startSection('content'); ?>
    <div>        
        <h2>Planetes</h2>
    </div>
    <div>
        <a href="<?php echo e(route('planets.create')); ?>"> Nou planeta</a>
    </div>
        
   
    <?php if(session('success')): ?>
        <div class="alert alert-success">
            <p><?php echo e(session('success')); ?></p>
        </div>
    <?php endif; ?>

    <?php if(session('error')): ?>
        <div class="alert alert-danger">
            <?php echo e(session('error')); ?>

        </div>
    <?php endif; ?>

       
    <table class="table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Planet Name</th>
                <th>Creation Date</th>                        
                <th>Operacions</th>
            </tr>
        </thead>
        
        <?php $__currentLoopData = $planets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $planet): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        
        <tr>
            <td><?php echo e($planet->id); ?></td>
            <td><?php echo e($planet->name); ?></td>
            <td><?php echo e($planet->created_at); ?></td>                     
            <td>     
                  <a href="<?php echo e(route('planets.show',$planet->id)); ?>">Mostrar</a>        
                  <a href="<?php echo e(route('planets.edit',$planet->id)); ?>">Editar</a>
                  <a href="<?php echo e(route('planets.destroy',$planet->id)); ?>">Esborrar</a>               
            </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </table>
  
    <?php echo e($planets->links('pagination::bootstrap-4')); ?>

      
<?php $__env->stopSection(); ?>
<?php echo $__env->make('plantilla', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/usuari/projectes/Superherois/resources/views/planets/index.blade.php ENDPATH**/ ?>