<?php $__env->startSection('head'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('css/slider.css')); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="<?php echo e(asset('css/profile/leftSection.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('css/nprogress.css')); ?>">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <link rel="icon" sizes="192x192" href="<?php echo e(asset('images/logo.png')); ?>">

<?php $__env->stopSection(); ?>

<?php $__env->startSection('navbar'); ?>
    <a style="color: white; padding: 1em; font-weight: 700; <?php if(Config::get('app.locale') == 'en'): ?>  text-decoration: underline;<?php endif; ?>" class="pull-right" href="<?php echo e(route('page',['lang'=>'en'])); ?>">En</a>
    <a style="color: white; padding: 1em; font-weight: 700; <?php if(Config::get('app.locale') == 'mk'): ?>  text-decoration: underline; <?php endif; ?>" class="pull-right" href="<?php echo e(route('page',['lang'=>'mk'])); ?>">Mk</a>
    <div style="clear: both"></div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="com-md-12">
            <div class="form-container" style="color: black;">
                <?php echo $__env->make('slider.forms.personalInfoForm', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <?php echo $__env->make('slider.forms.workExperience', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <?php echo $__env->make('slider.forms.addWorkExperienceForm', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <?php echo $__env->make('slider.forms.education', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <?php echo $__env->make('slider.forms.addEducationForm', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <?php echo $__env->make('slider.forms.topThreeSkills', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <?php echo $__env->make('slider.forms.addTopThreeSkills', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <?php echo $__env->make('slider.forms.additionalSkills', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <?php echo $__env->make('slider.forms.addAdditionalSkills', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <?php echo $__env->make('slider.forms.languages', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <?php echo $__env->make('slider.forms.addLanguages', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <?php echo $__env->make('slider.forms.accomplishmentsAndProjects', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <?php echo $__env->make('slider.forms.addAccomplishmentsAndProjectsForm', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <?php echo $__env->make('slider.forms.summary', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <?php echo $__env->make('slider.forms.socialNetworks', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <?php echo $__env->make('slider.forms.availability', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                <button class="btn btn-primary btn-lg col-md-5  "  style="margin: 2em; background-color: white; color: #EB5D5C; border: none; box-shadow: 0 3px 6px rgba(0,0,0,0.16), 0 3px 6px rgba(0,0,0,0.23); outline: none;
" id="saveAllButton"><?php echo app('translator')->getFromJson('slider.edit_page_save'); ?></button>
                <a class="btn btn-primary btn-lg col-md-5  "  style="margin: 0 2em 2em 2em; background-color: white; color: #EB5D5C; border: none; box-shadow: 0 3px 6px rgba(0,0,0,0.16), 0 3px 6px rgba(0,0,0,0.23); outline: none;
" href="<?php echo e(route('show-profile')); ?>"><?php echo app('translator')->getFromJson('slider.edit_page_cancel'); ?></a>
            </div>
        </div>
    </div>
</div>



<script src="https://unpkg.com/nprogress@0.2.0/nprogress.js"></script>
<script src="<?php echo e(asset('js/slider.js')); ?>"></script>



<script src="<?php echo e(asset('js/sliderDatabase.js')); ?>"></script>
<?php $__env->stopSection(); ?>
'
<?php echo $__env->make('defaultLayout.defaultLayout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>