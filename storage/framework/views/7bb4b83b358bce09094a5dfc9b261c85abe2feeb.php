<html>
<head>
    <title> <?php echo $__env->yieldContent('title'); ?> </title>
</head>
<body>
<?php echo $__env->make('shared.navbar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php echo $__env->yieldContent('content'); ?>
</body>
</html>