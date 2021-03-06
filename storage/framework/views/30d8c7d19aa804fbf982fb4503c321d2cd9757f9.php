<?php $__env->startSection('content'); ?>

    <?php echo $__env->make('layouts.message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    
    <section id="profile-show">
        <div class="container">
        <?php echo $__env->make('profile.profile', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>
    </section>

    <section id="posts">
        <div class="container">
            <!-- Publish a Post -->
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('storePost', $user)): ?>
            <div class="row">
                <div class="col-12 col-md-7 mx-md-auto">
                <?php echo $__env->make('post.create', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                </div>
            </div>
            <?php endif; ?>
            
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('viewProfile', $user)): ?>
            <!-- Post listing -->
            <div class="row">
                <div class="col-12 col-md-7 mx-md-auto">
                    <?php if(!$posts->isEmpty()): ?>

                        <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php echo $__env->make('post.post', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                            <div id="comments-<?php echo e($post->id); ?>" class="container-fluid rounded text-white mb-2 comments">
                                <?php if(!$post->oldestComments->isEmpty()): ?>
                                    <?php $__currentLoopData = $post->oldestComments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php echo $__env->make('comment.comment', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <a class="comments-loader" data-postid="<?php echo e($post->id); ?>" role="button">
                                        <p class="social-button my-3 text-center">More comments</p>
                                    </a>
                                <?php endif; ?>
                            </div>
                            <?php echo $__env->make('comment.create', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    <?php else: ?>
                        <p class="my-5 text-center">No posts yet</p>
                    <?php endif; ?>
                </div>
            </div>
            <?php else: ?>
            <div class="row">
                <div class="col-12 col-md-7 mx-md-auto text-center mt-4">
                    <h4>You have to be <?php echo e($user->name); ?>'s friend to view posts</h4>
                </div>
            </div>
            <?php endif; ?>

        </div>
    </section>
    
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('editProfile', $user)): ?>
        <?php echo $__env->make('profile.edit', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php endif; ?>
    
    <?php echo $__env->make('post.edit', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo $__env->make('post.delete', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo $__env->make('post.like_modal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo $__env->make('comment.edit', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo $__env->make('comment.delete', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo $__env->make('friendship.manage', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>