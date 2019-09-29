<section id="login">

	<?php if(Session::has('type')): ?>
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="alert alert-<?php echo e(Session::get('type')); ?> alert-dismissible fade show text-center" role="alert">
						<?php echo e(Session::get('message')); ?>

						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
				</div>
			</div>
		</div>
	<?php endif; ?>
	
	<div class="container">
		<div class="row">
			<div class="col-12 text-center">
				<h1>Sign in</h1>
				<form class="form-signin" method="POST" action="<?php echo e(route('login')); ?>">

					

					<input class="form-control form-control-lg <?php echo e(($errors->getBag('login')->has('login_email') or $errors->getBag('login')->has('credentials')) ? ' is-invalid' : ''); ?>" type="email" name="login_email" placeholder="Email" aria-label="login_email" required value="<?php echo e(old('login_email')); ?>">

					<input class="form-control form-control-lg <?php echo e(($errors->getBag('login')->has('login_password') or $errors->getBag('login')->has('credentials')) ? ' is-invalid' : ''); ?>" type="password" name="login_password" placeholder="Password" aria-label="login_password" required>

					<?php if($errors->hasBag('login')): ?>
						<div class="invalid-feedback text-center">
							<strong>
								<?php $__currentLoopData = $errors->getBag('login')->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<?php echo e($error); ?>

								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</strong>
						</div>
					<?php endif; ?>

					<div class="checkbox mb-3 text-center">
						<label>
							<input type="checkbox" name="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>> Remember me
						</label>
					</div>

					<button class="btn btn-lg btn-outline-success btn-block" type="submit">Submit</button>

				</form>
			</div>
		</div>
		<div class="row mt-3">
			<div class="col-12 text-center">
				<span class="mr-3">Do not have account?</span>
				<button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#registrationModal">Register one</button>
			</div>
		</div>
		<div class="row mt-3">
			<div class="col-12 text-center">
				<span class="mr-3">
					<a class="text-light" href="<?php echo e(route('password.request')); ?>">Forgot password</a>
				</span>
			</div>
		</div>
	</div>
</section>
