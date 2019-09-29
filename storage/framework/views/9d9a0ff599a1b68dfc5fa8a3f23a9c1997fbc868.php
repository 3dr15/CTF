<div class="row">

    <!-- Card User Info -->
    <div id="profile-info" class="col-12 col-md-8 order-2 order-md-1">
        <div class="card text-white mx-auto mt-5">

            <div class="card-header d-flex" id="info-heading">
                <h4 class="card-title mb-0 align-self-center" data-toggle="collapse" data-target="#info" aria-expanded="true" aria-controls="info">
                    <span id="name"><?php echo e($user->name); ?></span>
                    <span id="surname"><?php echo e($user->surname); ?></span>
                </h4>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('editProfile', $user)): ?>
                <a id="profile-edit-button" class="btn btn-secondary ml-auto rounded-circle" data-id="<?php echo e($user->id); ?>"><i class="fas fa-pencil-alt"></i></a>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->denies('manageFriendship', $user)): ?>
                    <?php if(!auth()->user()->isFriendOf($user->id) and !auth()->user()->friendshipSent($user->id) and !auth()->user()->friendshipReceived($user->id)): ?>
                        <!-- non è mio amico e no richieste-->
                        <button type="button" class="btn btn-info ml-auto friendship-add-button" data-id="<?php echo e($user->id); ?>">Request friendship</button>
                    <?php else: ?>
                        <!-- non è mio amico ma richieste / è mio amico -->
                        <div class="dropdown ml-auto">
                            <button class="btn btn-info dropdown-toggle" type="button" id="friendship-management" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <?php echo e(auth()->user()->friendshipSent($user->id) ? 'Friendship request sent' : ''); ?>


                                    <?php echo e(auth()->user()->friendshipReceived($user->id) ? 'Friendship request recieved' : ''); ?>


                                    <?php echo e(auth()->user()->isFriendOf($user->id) ? 'Action' : ''); ?>

                            </button>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="friendship-management">

                                <?php if(auth()->user()->friendshipSent($user->id)): ?>
                                    <a href="#" class="dropdown-item friendship-delete-button" data-id="<?php echo e($user->id); ?>">Cancel frinedship request</a>
                                <?php endif; ?>

                                <?php if(auth()->user()->friendshipReceived($user->id)): ?>
                                    <a href="#" class="dropdown-item friendship-accept-button" data-id="<?php echo e($user->id); ?>">Accept friendship request</a>
                                    <a href="#" class="dropdown-item friendship-delete-button" data-id="<?php echo e($user->id); ?>">Decline</a>
                                <?php endif; ?>

                                <?php if(auth()->user()->isFriendOf($user->id)): ?>
                                    <a href="#" class="dropdown-item friendship-delete-button" data-id="<?php echo e($user->id); ?>">Delete friend</a>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php endif; ?>
            </div>

            <div id="info" class="collapse show" aria-labelledby="info-heading" data-parent="#profile-info">
                <div class="card-body">
                    <i class="far fa-envelope mr-2"></i><strong>Email:</strong><p id="email" class="card-text mt-3"><?php echo e($user->email); ?></p>
                    <i class="fas fa-mobile mr-2"></i><strong>Phone:</strong><p id="phone" class="card-text mt-3">
                        <?php if($user->phone): ?>
                        <?php echo e($user->phone); ?>

                        <?php else: ?>
                        No phone.
                        <?php endif; ?>
                    </p>
                    <i class="fas fa-birthday-cake mr-2"></i><strong>Birthday:</strong><p id="birthday" class="card-text mt-3"><?php echo e($user->birthday); ?></p>
                    <i class="fas fa-venus-mars mr-2"></i><strong>Sex:</strong><p id="sex" class="card-text mt-3">
                        <?php if(!strcmp($user->sex, "M")): ?>
                        Male
                        <?php else: ?>
                        Female
                        <?php endif; ?>
                    </p>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('viewProfile', $user)): ?>
                    <i class="fas fa-user mr-2"></i><strong>Bio:</strong><p id="bio" class="card-text mt-3">
                        <?php if($user->bio): ?>
                        <?php echo e($user->bio); ?>

                        <?php else: ?>
                        No bio.
                        <?php endif; ?>
                    </p>
                    <?php else: ?>
                    <i class="fas fa-user mr-2"></i><strong>Bio:</strong><p id="bio" class="card-text mt-3">
                    Only friends can view bio.
                    </p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    <!-- Card End -->

    <!-- Image User -->
    <div class="align-self-center col-12 col-md-4 order-1 order-md-2 mt-5">
        <img id="profile-image" src="<?php echo e($user->image_url); ?>" alt="user image" class="img-fluid img-thumbnail rounded-circle">

        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('editProfile', $user)): ?>
        <form id="profile-image-edit" method="POST" action="<?php echo e(route('profile-image-update', $user->id)); ?>" enctype="multipart/form-data">
            
            <?php echo e(method_field('PUT')); ?>

            <label class="btn btn-secondary rounded-circle" for="profile-image-update"><i class="fas fa-pencil-alt"></i></label>
            <input type="file" name="user-image" id="profile-image-update" data-id="<?php echo e($user->id); ?>" class="form-control" accept=".jpg, .jpeg, .png">
        </form>
        <?php endif; ?>

        <?php if($errors->getBag('profileImage')->has('user-image')): ?>
            <strong class="text-danger"><?php echo e($errors->getBag('profileImage')->first('user-image')); ?></strong>
        <?php endif; ?>
    </div>
    <!-- Image User End -->
</div>

<a name="content"></a>

<!-- Nav Buttons -->
<div class="row mt-5">
    <div class="col-6 text-center">
        <a href="<?php echo e(route('profile-show', $user)); ?>#content" class="btn btn-success btn-nav"><i class="fas fa-home mr-2"></i>Timeline</a>
    </div>
    <div class="col-6 text-center">
        <a href="<?php echo e(route('friends-index', $user)); ?>#content" class="btn btn-success btn-nav"><i class="fas fa-users mr-2"></i>Friend page</a>
    </div>
</div>
<!-- Nav Buttons End -->

<div class="row">
    <div class="col-12">
        <hr class="mt-5">
    </div>
</div>
