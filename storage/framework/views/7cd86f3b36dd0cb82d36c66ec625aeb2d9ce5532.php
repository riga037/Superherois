<?php $__env->startSection('content'); ?>
    <div>        
        <h2>Superherois</h2>
    </div>
    <div>
        <a href="<?php echo e(route('superheroes.create')); ?>"> Nou superheroi</a>
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
                <th>Hero Name</th>
                <th>Gender</th>                        
                <th>Operacions</th>
            </tr>
        </thead>
        
        <?php $__currentLoopData = $superheroes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $superhero): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        
        <tr>
            <td><?php echo e($superhero->id); ?></td>
            <td><?php echo e($superhero->heroname); ?></td>
            <td><?php echo e($superhero->gender); ?></td>                     
            <td>     
                <a href="<?php echo e(route('superheroes.show',$superhero->id)); ?>">Mostrar</a> 
                <?php if(Auth::user()->role=='admin'): ?> 
                <a href="<?php echo e(route('superheroes.editsuperpowers',$superhero->id)); ?>">Poders</a>  
                <a href="<?php echo e(route('superheroes.edit',$superhero->id)); ?>">Editar</a>
                <a href="<?php echo e(route('superheroes.destroy',$superhero->id)); ?>">Esborrar</a>   
                <?php endif; ?>            
            </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </table>
  
    <?php echo e($superheroes->links('pagination::bootstrap-4')); ?>

      
<?php $__env->stopSection(); ?>

<?php echo $__env->make('plantilla', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/usuari/projectes/Superherois/resources/views/superheroes/index.blade.php ENDPATH**/ ?>