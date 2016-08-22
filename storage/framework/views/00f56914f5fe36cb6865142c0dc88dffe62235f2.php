<?php $__env->startSection('title', 'ShowAll'); ?>

<?php $__env->startSection('content'); ?>
            <div class="panel-heading">
                <h2> 已提需求列表 </h2>
            </div>
            <?php if($requirements->isEmpty()): ?>
                <p> 目前沒有需求.</p>
            <?php else: ?>
                <table class="table">
                    <thead>
                    <tr>
                        <th>Requirement ID</th>
                        <th>Title</th>
                        <th>Name</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($requirements as $requirement): ?>
                        <tr>
                            <td><?php echo $requirement->req_id; ?> </td>
                            <td>
                                <a href="<?php echo action('RequirementsController@show', $requirement->req_id); ?>"><?php echo $requirement->title; ?> </a>
                            </td>
                            <td><?php echo $requirement->user_id; ?> </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>