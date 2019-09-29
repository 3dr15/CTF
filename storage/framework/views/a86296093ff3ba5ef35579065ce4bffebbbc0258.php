<!-- Post -->
<div id="post-<?php echo e($post->id); ?>" class="pt-3">
    <div class="card">

        <div class="card-header">
            <div class="container-fluid">
                <div class="row justify-content-start">

                    <!-- User image, name and post timestamp -->
                    <div class="col-2 col-md-2 col-lg-1 px-0">
                        <img src="<?php echo e($post->user->image_url); ?>" alt="user image" class="img-fluid img-thumbnail rounded-circle author-image-sm">
                    </div>

                    <div class="col-auto d-flex flex-column justify-content-center">
                        <a class="post-author" href="<?php echo e(route( 'profile-show', $post->user )); ?>"><?php echo e($post->user->name); ?>  <?php echo e($post->user->surname); ?></a>
                        <small class="post-time"><i class="far fa-clock mr-2"></i><?php echo e($post->created_at->diffForHumans(null, true)); ?></small>
                    </div>

                    <!-- Post edit -->
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('editPost',$post)): ?>
                        <div class="col-auto align-self-center ml-auto">
                            <div class="dropdown show">
                                <a href="#" role="button" id="post-manage" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-ellipsis-v"></i></a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="post-manage">
                                    <a class="dropdown-item text-right post-edit-button" data-id="<?php echo e($post->id); ?>">Edit<i class="fa fa-edit ml-2"></i></a>
                                    <a class="dropdown-item text-right post-delete-button" data-id="<?php echo e($post->id); ?>">Delete<i class="fas fa-trash ml-2"></i></a>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>

                </div>
            </div>
        </div>

        <div class="card-body">
            <!-- Post image -->
            <?php if($post->image_url): ?>
                <img class="card-img-top mb-4" src="<?php echo e($post->image_url); ?>" alt="post image">
            <?php endif; ?>
            <!-- Post text -->
            <!-- Post text -->
            <p class="card-text text-justify"><?php echo e($post->text); ?></p>

            <div id="like-amount-<?php echo e($post->id); ?>">
                <?php if( ($num = $post->getLikesAmount()) == 1): ?>
                    <a class="social-button post-likes" data-postid="<?php echo e($post->id); ?>" data-toggle="modal" data-target="#likeUsersModal">Liked <?php echo e($num); ?> time</a>
                <?php elseif( $num > 1 ): ?>
                    <a class="social-button post-likes" data-postid="<?php echo e($post->id); ?>" data-toggle="modal" data-target="#likeUsersModal">Liked <?php echo e($num); ?> times</a>
                <?php endif; ?>
            </div>

        </div>

        <!-- Post interaction buttons -->
        <div class="card-footer">
            <div class="d-flex justify-content-around">
                <a class="social-button like <?php echo e(auth()->user()->hasLike($post->id) ? 'has-like' : 'hasnt-like'); ?>" data-postid="<?php echo e($post->id); ?>"><i class="fas fa-thumbs-up mr-2"></i><span class="d-none d-md-inline">Like</span></a>
                <a class="social-button comment-write" data-postid="<?php echo e($post->id); ?>"><i class="fas fa-comment mr-2"></i><span class="d-none d-md-inline">Comment</span></a>
                <?php if(Route::currentRouteName() == 'post-show'): ?>
                    <a class="social-button" href="<?php echo e(url()->to(URL::previous() . '#post-' . $post->id)); ?>"><i class="fas fa-compress mr-2"></i><span class="d-none d-md-inline">Back to timeline</span></a>
                <?php else: ?>
                    <a class="social-button" href="<?php echo e(route('post-show', $post)); ?>"><i class="fas fa-expand mr-2"></i><span class="d-none d-md-inline">Post page</span></a>
                <?php endif; ?>
            </div>
        </div>

    </div>
</div>
<!-- End Post -->

