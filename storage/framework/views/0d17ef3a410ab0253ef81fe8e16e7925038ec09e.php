   
<?php $__env->startSection('content'); ?>
<div>
    <a href="<?php echo e(route('superheroes.index')); ?>"> Tornar</a>
</div>

<div>    
    <h2>Poders de <?php echo e($superhero->heroname); ?></h2>
</div>
        
  
<?php if($errors->any()): ?>
    <div class="alert alert-danger">
        <ul>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
<?php endif; ?>


<div class="row">

    <div class="col-sm">
     	<form method='POST' action="<?php echo e(route('superheroes.detachsuperpowers',$superhero->id)); ?>">
            <?php echo csrf_field(); ?>
	     	<div class="form-group">
	    	  <label>Poders assignats</label>
	    	  <select multiple  size="10" name="powers[]" class="form-control">
	    			
	    		<?php $__currentLoopData = $superhero->superpowers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $power): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> {		
	                  <option value="<?php echo e($power->id); ?>">
                            <?php echo e($power->description); ?>                              
                          </option>                         
	                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	    			
	    	</select>
	    	</div>
	    	<input type="submit" value="Treure poders" class="btn btn-dark">
    	</form>

    </div>
    <div class="col-sm">
    	<form method='POST' action="<?php echo e(route('superheroes.assignsuperpowers',$superhero->id)); ?>">
             <?php echo csrf_field(); ?>
      		<div class="form-group">
    		<label>Llista Poders</label>
    		<select multiple class="form-control" size="20" name="powers[]">
          
    		  <?php $__currentLoopData = $superpowers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $power): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> {        
                    <option value="<?php echo e($power->id); ?>">
                      <?php echo e($power->description); ?>                              
                    </option>                         
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    		</select>
    		
    		</div>
    		<input class="btn btn-dark" value="Assignar poders" type="submit">
    	</form>
    </div>
    
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

<?php $__env->stopSection(); ?>
<?php echo $__env->make('plantilla', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/usuari/projectes/Superherois/resources/views/superheroes/showSuperpowers.blade.php ENDPATH**/ ?>