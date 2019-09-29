<div id="#post-create" class="mt-5">
    <h4>Create a post<i class="fas fa-pencil-alt fa-xs ml-3"></i></h4>

    <form id="post-create-form" method="POST" action="<?php echo e(route('post-store')); ?>" enctype="multipart/form-data">
        

        <div class="form-row">
            <div class="form-group col-12">
                <label class="sr-only" for="post-text-create">Post textarea</label>
                <textarea id="post-text-create" class="form-control" name="post-text" rows="5" placeholder="What's new <?php echo e(auth()->user()->name); ?>?" required></textarea>
            </div>
        </div>
        

        <div class="form-row">
        <div class="form-group col-auto">
                   <input type="text" id="post-image-create" class="form-control" name="post-image" data-id="post-create-form" placeholder="Image url (optional)">
            </div>
            <div class="form-group col-auto ml-auto">
                <button type="submit" class="btn btn-primary">Publish<i class="fas fa-paper-plane ml-2"></i></button>

            </div>
        </div>
        
    </form>
</div>