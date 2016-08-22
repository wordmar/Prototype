<?php $__env->startSection('title', 'Create'); ?>
<?php $__env->startSection('content'); ?>
    <h1>
        Create
    </h1>
    <?php foreach($errors->all() as $error): ?>
        <p><?php echo e($error); ?></p>
    <?php endforeach; ?>
    <form method="post" action="/store">
        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
        <fieldset>
            <label for="title">Title</label>
            <div>
                <?php /*<input type="text" id="title" name="title" value="Title">*/ ?>
                <input type="text" id="title" name="title" value="">
            </div>
            <label for="content">Content</label>
            <div>
                <?php /*<textarea rows="3" id="content" name="content">Content</textarea>*/ ?>
                <textarea rows="3" id="content" name="content"></textarea>
            </div>
            <div>
                <button type="submit">新增需求</button>
            </div>
        </fieldset>
    </form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>