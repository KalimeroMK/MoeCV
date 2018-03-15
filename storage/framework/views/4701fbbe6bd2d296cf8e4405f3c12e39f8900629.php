<div class="container">
	<div class="row">
		<div class="col-md-5 col-sm-5 title">
			<h1><?php echo app('translator')->getFromJson('mainPage.main_page_title'); ?></h1>
			<h2 class="p-1" style="padding-right: 0.5em; font-size: 16px;"><?php echo app('translator')->getFromJson('mainPage.main_page_small_title'); ?></h2>
			<a href="<?php echo e(route('login-route')); ?>"><button class="btn btn-lg"><?php echo app('translator')->getFromJson('mainPage.main_page_button'); ?></button></a>
		</div>
		<div class="col-md-6 col-md-offset-1 col-xs-10 col-xs-offset-1 col-sm-6 pic ">
		</div>
	</div>
	<div class="sicon" style="font-size: 30px">

			<div class="col-lg-1 col-md-1 col-sm-2 col-xs-3 text-center">
				<div class="icon-circle">
					<a href="#" class="ifacebook" title="Facebook"><i class="fa fa-facebook"></i></a>
				</div>
			</div>

			<div class="col-lg-1 col-md-1 col-sm-2 col-xs-3 text-center">
				<div class="icon-circle">
					<a href="#" class="itwittter" title="Twitter"><i class="fa fa-twitter"></i></a>
				</div>
			</div>

			<div class="col-lg-1 col-md-1 col-sm-2 col-xs-3 text-center">
				<div class="icon-circle">
					<a href="#" class="igoogle" title="Google+"><i class="fa fa-google-plus"></i></a>
				</div>
			</div>

			<div class="col-lg-1 col-md-1 col-sm-2 col-xs-3 text-center">
				<div class="icon-circle">
					<a href="#" class="iLinkedin" title="Linkedin"><i class="fa fa-linkedin"></i></a>
				</div>
			</div>

		</div>
</div>
