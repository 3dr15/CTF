<form id="friendship-add-form" method="POST" action="<?php echo e(route('friendship-store')); ?>">
    
    
    <input id="friendship-add" type="hidden" name="friend_id">
</form>

<form id="friendship-accept-form" method="POST" action="<?php echo e(route('friendship-update')); ?>">
    
    <?php echo e(method_field('PUT')); ?>

    <input id="friendship-accept" type="hidden" name="friend_id">
</form>

<form id="friendship-delete-form" method="POST" action="<?php echo e(route('friendship-delete')); ?>">
    
    <?php echo e(method_field('DELETE')); ?>

    <input id="friendship-delete" type="hidden" name="friend_id">
</form>
