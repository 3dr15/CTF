<?php $__env->startSection('content'); ?>

	<?php echo $__env->make('auth.login', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

	<?php echo $__env->make('auth.register', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script type="text/javascript">
	<?php if($errors->hasBag('register')): ?>
		$(document).ready(function(){
			$("#registrationModal").modal('show');
		});
	<?php endif; ?>
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>