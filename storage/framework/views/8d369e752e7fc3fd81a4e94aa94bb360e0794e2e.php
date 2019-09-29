<!-- Modal -->
<div class="modal fade" id="registrationModal" tabindex="-1" role="dialog" aria-labelledby="registration" aria-hidden="true">
  	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    	<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="registration">Registration</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="container">
					<div class="row">
						<div class="col-12 col-md-10 offset-md-1">
							<form method="POST" action="<?php echo e(route('register')); ?>">

								<?php echo csrf_field(); ?>


								<div class="form-group row">

									<div class="col-12 col-md-6 mb-3 mb-md-0">
										<label class="sr-only" for="name">First name</label>
										<input type="text" name="name" class="form-control <?php echo e($errors->getBag('register')->has('name') ? ' is-invalid' : ''); ?>" id="name" aria-describedby="name" placeholder="First name" required value="<?php echo e(old('name')); ?>">
										<?php if($errors->getBag('register')->has('name')): ?>
											<div class="invalid-feedback">
												<strong><?php echo e($errors->getBag('register')->first('name')); ?></strong>
											</div>
										<?php endif; ?>
									</div>

									<div class="col-12 col-md-6">
										<label class="sr-only" for="surname">Surname</label>
										<input type="text" name="surname" class="form-control <?php echo e($errors->getBag('register')->has('surname') ? ' is-invalid' : ''); ?>" id="surname" aria-describedby="surname" placeholder="Surname" required value="<?php echo e(old('surname')); ?>">
										<?php if($errors->getBag('register')->has('surname')): ?>
											<div class="invalid-feedback">
												<strong><?php echo e($errors->getBag('register')->first('surname')); ?></strong>
											</div>
										<?php endif; ?>
									</div>

								</div>

								<div class="form-group row">
									<div class="col-12">
										<label class="sr-only" for="registration_email">Email</label>
										<input type="email" name="registration_email" class="form-control <?php echo e($errors->getBag('register')->has('registration_email') ? ' is-invalid' : ''); ?>" id="registration_email" aria-describedby="registration_email" placeholder="Email" required value="<?php echo e(old('registration_email')); ?>">
										<?php if($errors->getBag('register')->has('registration_email')): ?>
											<div class="invalid-feedback">
												<strong><?php echo e($errors->getBag('register')->first('registration_email')); ?></strong>
											</div>
										<?php endif; ?>
									</div>
								</div>

								<div class="form-group row">
									<div class="col-12 col-md-6 mb-3 mb-md-0">
										<label class="sr-only" for="registration_password">Password</label>
										<input type="password" name="registration_password" class="form-control <?php echo e($errors->getBag('register')->has('registration_password') ? ' is-invalid' : ''); ?>" id="registration_password" aria-describedby="registration_password" placeholder="Password" required >
										<?php if($errors->getBag('register')->has('registration_password')): ?>
											<div class="invalid-feedback">
												<strong><?php echo e($errors->getBag('register')->first('registration_password')); ?></strong>
											</div>
										<?php endif; ?>
									</div>

									<div class="col-12 col-md-6">
										<label class="sr-only" for="">Confirm password</label>
										<input type="password" name="registration_password_confirmation" class="form-control <?php echo e($errors->getBag('register')->has('registration_password_confirmation') ? ' is-invalid' : ''); ?>" id="registration_password_confirmation" aria-describedby="registration_password_confirmation" placeholder="Confirm password" required>
									</div>
								</div>

								<div class="form-group row">
									<div class="col-12">
										<label class="sr-only" for="birthday">Birthday date</label>
										<input type="date" name="birthday" class="form-control <?php echo e($errors->getBag('register')->has('birthday') ? ' is-invalid' : ''); ?>" id="birthday" aria-describedby="birthday" required value="<?php echo e(old('birthday')); ?>">
										<?php if($errors->getBag('register')->has('birthday')): ?>
											<div class="invalid-feedback">
												<strong><?php echo e($errors->getBag('register')->first('birthday')); ?></strong>
											</div>
										<?php endif; ?>
									</div>
								</div>

								<div class="form-group row">
									<div class="col-12">
										<div class="form-check form-check-inline">
											<input class="form-check-input <?php echo e($errors->getBag('register')->has('sex') ? ' is-invalid' : ''); ?>" type="radio" name="sex" id="male" value="M" required <?php if( old('sex') == 'M'): ?> checked <?php endif; ?>>
											<label class="form-check-label" for="male">Male</label>
										</div>
										<div class="form-check form-check-inline">
											<input class="form-check-input <?php echo e($errors->getBag('register')->has('sex') ? ' is-invalid' : ''); ?>" type="radio" name="sex" id="female" value="F" required <?php if( old('sex') == 'F'): ?> checked <?php endif; ?>>
											<label class="form-check-label" for="female">Female</label>
										</div>
										<?php if($errors->getBag('register')->has('sex')): ?>
											<div class="invalid-feedback">
												<strong><?php echo e($errors->getBag('register')->first('sex')); ?></strong>
											</div>
										<?php endif; ?>
									</div>
								</div>

								<div class="form-group row">
									<div class="col-12">
										<button type="submit" class="btn btn-outline-primary mr-2">Submit</button>

										<button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Abort</button>
									</div>
								</div>

							</form>
						</div>
					</div>
				</div>
			</div>
    	</div>
  	</div>
</div>