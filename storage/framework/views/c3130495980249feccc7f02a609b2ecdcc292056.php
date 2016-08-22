<?php $__env->startSection('title', 'Show'); ?>

<?php $__env->startSection('content'); ?>
    <h1>
        Show
    </h1>
    <fieldset>
        <fieldset>
            <label for="title">Title</label>
            <div>
                <?php echo $requirement->title; ?>

            </div>
        </fieldset>
        <fieldset>
            <label for="content">Content</label>
            <div>
                <?php echo $requirement->content; ?>

            </div>
        </fieldset>
    </fieldset>
    <form method="post" action="<?php echo action('RequirementsController@edit', $requirement->req_id); ?>">
        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
        <div>
            <button type="submit">前往編輯畫面</button>
        </div>
    </form>
    <form method="post" action="<?php echo action('RequirementsController@destroy', $requirement->req_id); ?>">
        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
        <div>
            <button type="submit">刪除</button>
        </div>
    </form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>