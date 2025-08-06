<?php $__env->startSection('title', 'Notifications'); ?>

<?php $__env->startSection('content_header'); ?>
    <div class="mb-3 d-flex justify-content-between align-items-center">
        <h1 class="h4">Notifications</h1>
        <form action="<?php echo e(route('notifications.markAllRead')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <button type="submit" class="btn btn-sm btn-success">Mark All as Read</button>
        </form>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php if(session('success')): ?>
        <div class="alert alert-success"><?php echo e(session('success')); ?></div>
    <?php endif; ?>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Created By</th>
                <th>Status</th>
                <th>Created</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        <?php $__currentLoopData = $notifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($index + 1); ?></td>

                <td>
                    <a href="<?php echo e(route('admin.posts.show', $notification->data['post_id'])); ?>">
                        <?php echo e($notification->data['title'] ?? 'No Title'); ?>

                    </a>
                </td>

                <td><?php echo e($notification->data['created_by'] ?? '-'); ?></td>

                <td>
                    <?php if($notification->read_at): ?>
                        <span class="badge badge-success">Read</span>
                    <?php else: ?>
                        <span class="badge badge-warning">Unread</span>
                    <?php endif; ?>
                </td>

                <td><?php echo e($notification->created_at->diffForHumans()); ?></td>

                <td>
                    <?php if(!$notification->read_at): ?>
                        <form action="<?php echo e(route('notifications.markRead', $notification->id)); ?>" method="POST" class="d-inline">
                            <?php echo csrf_field(); ?>
                            <button class="btn btn-sm btn-primary">
                                Mark as Read
                            </button>
                        </form>
                    <?php else: ?>
                        <button class="btn btn-sm btn-secondary" disabled>Marked</button>
                    <?php endif; ?>
                </td>

            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>

    <?php echo e($notifications->links()); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('adminlte::page', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\quick-task\resources\views/admin/notifications/index.blade.php ENDPATH**/ ?>