<?php $__env->startSection('title', 'Users'); ?>

<?php $__env->startSection('content_header'); ?>
    <h1>Users</h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <a href="<?php echo e(route('admin.users.create')); ?>" class="btn btn-primary mb-3">Add User</a>

    <?php if(session('success')): ?>
        <div class="alert alert-success"><?php echo e(session('success')); ?></div>
    <?php endif; ?>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Email</th>
                <th>Mobile</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($user->id); ?></td>
                    <td><?php echo e($user->username); ?></td>
                    <td><?php echo e($user->email); ?></td>
                    <td><?php echo e($user->mobile); ?></td>
                    <td>
                        <a href="<?php echo e(route('admin.users.edit', $user->id)); ?>" class="btn btn-sm btn-warning">Edit</a>
                        <form action="<?php echo e(route('admin.users.destroy', $user->id)); ?>" method="POST" class="d-inline"
                              onsubmit="return confirm('Are you sure?')">
                            <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                            <button class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>

    <?php echo e($users->links()); ?>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('adminlte::page', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\quick-task\resources\views/admin/users/index.blade.php ENDPATH**/ ?>