<div class="container">
<?php $__empty_1 = true; $__currentLoopData = $friends; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $friend): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
    <div class="row my-5">
        <div class="col-4 col-md-2 text-center">
            <img src="<?php echo e($friend->image_url); ?>" alt="user image" class="img-fluid rounded-circle img-thumbnail img-md">
        </div>
        <div class="col-8 col-md-5 d-flex">
            <span class="align-self-center"><a href="<?php echo e(route('profile-show', $friend->id)); ?>"><?php echo e($friend->name); ?>  <?php echo e($friend->surname); ?></a></span>
        </div>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('manageFriendship',$user)): ?>
            <div class="col-12 col-md-5 d-flex justify-content-around mt-4 mt-md-0">
                <form class="align-self-center" method="POST" action="<?php echo e(route('friendship-delete')); ?>">
                    
                    <?php echo e(method_field('DELETE')); ?>

                    <input type="hidden" name="friend_id" value="<?php echo e($friend->id); ?>">
                    <button type="submit" class="btn btn-danger">Remove from friends</button>
                </form>
            </div>
        <?php endif; ?>
    </div>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
    <div class="row my-5">
        <div class="col-12 text-center">
            <p>Nothing to show</p>
        </div>
    </div>
<?php endif; ?>
</div>
