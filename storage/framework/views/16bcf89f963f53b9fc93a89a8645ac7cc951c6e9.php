<?php $__env->startSection('title', 'Result'); ?>

<?php $__env->startSection('content'); ?>
    <h1>
        Result:<?php echo $result; ?>

    </h1>

    <?php foreach($errors->all() as $error): ?>
        <p class="alert alert-danger"><?php echo e($error); ?></p>
    <?php endforeach; ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>