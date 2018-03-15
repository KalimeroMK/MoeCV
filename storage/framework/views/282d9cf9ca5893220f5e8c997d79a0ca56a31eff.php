<?php $__env->startSection('head'); ?>
	<link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/LoginRegisterPage.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h2><?php echo app('translator')->getFromJson('login.login_register_my_cv_title'); ?></h2>
				<form method="POST" action="<?php echo e(route('login')); ?>">
					<?php echo e(csrf_field()); ?>


					<input type="email" name="email" placeholder="<?php echo app('translator')->getFromJson('login.account_register_email'); ?>">


					<?php if($errors->has('email')): ?>
						<span class="help-block " id="LoginEmailError">
                                        <strong style="color: white"><?php echo e($errors->first('email')); ?></strong>
                                    </span>
					<?php endif; ?>
					<input type="password" name="password" placeholder="<?php echo app('translator')->getFromJson('login.account_register_password'); ?>">

					<?php if($errors->has('password')): ?>
						<span class="help-block " id="LoginPasswordError">
                                        <strong style="color: white"><?php echo e($errors->first('password')); ?></strong>
                                    </span>
					<?php endif; ?>
					<button><?php echo app('translator')->getFromJson('login.account_register_login'); ?></button><br><br>
				</form>
				<h4><?php echo app('translator')->getFromJson('login.login_register_my_cv_question'); ?></h4> <span><a style="color: white;text-decoration: underline" class="second" href="<?php echo e(route('register-route')); ?>"><?php echo app('translator')->getFromJson('login.account_register_sign_up_button'); ?></a></span>

			</div>
		</div>
	</div>



<?php $__env->stopSection(); ?>


<?php echo $__env->make('defaultLayout.defaultLayout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>