<?php $__env->startSection('content'); ?>

    <?php echo $__env->make('layouts.message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <section id="posts">
        <div class="container">
            <!-- Post -->
            <div class="row">
                <div class="col-12 col-md-7 mx-md-auto mt-5">
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
                </div>
            </div>
            <!-- Post End -->
        </div>
    </section>

    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('editPost', $post)): ?>
        <?php echo $__env->make('post.edit', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php endif; ?>

    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('destroyPost', $post)): ?>
        <?php echo $__env->make('post.delete', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php endif; ?>

    <?php echo $__env->make('post.like_modal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo $__env->make('comment.edit', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo $__env->make('comment.delete', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>