<?php $__env->startSection('title', 'Edit'); ?>

<?php $__env->startSection('content'); ?>
    <h1>
        Edit
    </h1>

    <?php foreach($errors->all() as $error): ?>
        <p><?php echo e($error); ?></p>
    <?php endforeach; ?>

    <form method="post" action="/requirements/<?php echo $requirement->req_id; ?>/update">
        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
        <fieldset>
            <label for="title">Title</label>
            <div>
                <input type="text" id="title" name="title" value="<?php echo $requirement->title; ?>">
            </div>
            <label for="content">Content</label>
            <div>
                <textarea rows="3" id="content" name="content"><?php echo $requirement->content; ?></textarea>
            </div>
            <div>
                <button type="submit">Update</button>
            </div>
        </fieldset>
    </form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>