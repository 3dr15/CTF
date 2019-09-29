<?php $__env->startSection('content'); ?>

    <?php echo $__env->make('layouts.message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    
    <section id="profile-show">
        <div class="container">
        <?php echo $__env->make('profile.profile', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>
    </section>

    <section id="friends-index">
        <div class="container">
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('viewProfile', $user)): ?>
            <div class="row">
                <div class="col-12">
                    <ul class="nav nav-tabs" id="friends-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="friends-accepted-tab" data-toggle="tab" href="#friends-accepted" role="tab" aria-controls="friends-accepted" aria-selected="true">Manage friends</a>
                        </li>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('manageFriendship',$user)): ?>
                            <li class="nav-item">
                                <a class="nav-link" id="friends-request-tab" data-toggle="tab" href="#friends-request" role="tab" aria-controls="friends-request" aria-selected="false">Recieved invites</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="friends-pendent-tab" data-toggle="tab" href="#friends-pendent" role="tab" aria-controls="friends-pendent" aria-selected="false">Requested invites</a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
                <div class="col-12">
                    <div class="tab-content" id="friends-tab-content">
                        <div class="tab-pane fade show active" id="friends-accepted" role="tabpanel" aria-labelledby="friends-accepted-tab">
                            <?php echo $__env->make('friendship.friends', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                        </div>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('manageFriendship',$user)): ?>
                            <div class="tab-pane fade" id="friends-request" role="tabpanel" aria-labelledby="friends-request-tab"></div>
                            <div class="tab-pane fade" id="friends-pendent" role="tabpanel" aria-labelledby="friends-pendent-tab"></div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <?php else: ?>
            <div class="row">
                <div class="col-12 col-md-7 mx-md-auto text-center mt-4">
                    <h4> Only friends of <?php echo e($user->name); ?> can view posts</h4>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </section>
    

    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('manageFriendship',$user)): ?>
        <?php echo $__env->make('friendship.manage', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php endif; ?>
    
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('editProfile', $user)): ?>
        <?php echo $__env->make('profile.edit', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php endif; ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>