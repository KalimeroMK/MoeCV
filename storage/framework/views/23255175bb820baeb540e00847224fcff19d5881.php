<?php $__env->startSection('head'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('defaultLayout.mainPageNavBar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('defaultLayout.MainPageContent', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('footer'); ?>
<div class="col-md-12 mainPageFooter">
	<h3 class="col-md-9 pull-left" style="padding: 1em;padding-bottom: 0.5em; font-size: 16px"><?php echo app('translator')->getFromJson('mainPage.footer'); ?><a href="http://codepreneurs.co/" style="color: white; text-decoration: underline; font-weight: 700">Академијата за програмирање на Brainster</a></h3>
	<h4><a href="<?php echo e(route('privacy-info')); ?>" class="col-md-3 pull-right" style="color: white;padding: 2%; padding-bottom: 0.5em; text-decoration: underline; font-size: 14px"><?php echo app('translator')->getFromJson('mainPage.privacy'); ?></a></h4>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('defaultLayout.defaultLayout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>