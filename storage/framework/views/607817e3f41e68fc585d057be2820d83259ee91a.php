<?php $__env->startSection('content'); ?>
    <div>        
        <h2>Superpoders</h2>
    </div>
    <div>
        <a href="<?php echo e(route('superpowers.create')); ?>"> Nou superpoder</a>
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
                <th>Description</th>                  
                <th>Operacions</th>
            </tr>
        </thead>
        
        <?php $__currentLoopData = $superpowers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $superpower): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        
        <tr>
            <td><?php echo e($superpower->id); ?></td>
            <td><?php echo e($superpower->description); ?></td>                
            <td>     
                  <a href="<?php echo e(route('superpowers.show',$superpower->id)); ?>">Mostrar</a>   
                <?php if(Auth::user()->is_admin): ?>     
                  <a href="<?php echo e(route('superpowers.edit',$superpower->id)); ?>">Editar</a>
                  <a href="<?php echo e(route('superpowers.destroy',$superpower->id)); ?>">Esborrar</a>    
                <?php endif; ?>           
            </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </table>
  
    <?php echo e($superpowers->links('pagination::bootstrap-4')); ?>

      
<?php $__env->stopSection(); ?>
<?php echo $__env->make('plantilla', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/usuari/projectes/Superherois/resources/views/superpowers/index.blade.php ENDPATH**/ ?>