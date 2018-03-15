<?php $__env->startSection('head'); ?>

    <style>
        body{
            background-color: white;
            color: #333333;
        }
    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('defaultLayout.mainPageNavBar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo $__env->make('defaultLayout.aboutUsContent', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('footer'); ?>
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('defaultLayout.defaultLayout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>