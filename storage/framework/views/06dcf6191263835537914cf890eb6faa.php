<?php $__env->startSection('title', 'Posts'); ?>

<?php $__env->startSection('content_header'); ?>
    <h1>Posts</h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <a href="<?php echo e(route('admin.posts.create')); ?>" class="btn btn-primary mb-3">Add Post</a>

    <?php if(session('success')): ?>
        <div class="alert alert-success"><?php echo e(session('success')); ?></div>
    <?php endif; ?>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>User</th>
                <th>Title</th>
                <th>Description</th>
                <th>Phone</th>
                <th>Created</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($post->id); ?></td>
                <td><?php echo e($post->user->username ?? '-'); ?></td>
                <td><?php echo e($post->title); ?></td>
                <td><?php echo e(Str::limit($post->description, 50)); ?></td>
                <td><?php echo e($post->phone); ?></td>
                <td><?php echo e($post->created_at->diffForHumans()); ?></td>
                <td>
                    <a href="<?php echo e(route('admin.posts.edit', $post->id)); ?>" class="btn btn-sm btn-warning">Edit</a>
                    <form action="<?php echo e(route('admin.posts.destroy', $post->id)); ?>" method="POST" class="d-inline"
                          onsubmit="return confirm('Are you sure?')">
                        <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                        <button class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>

    <?php echo e($posts->links()); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('adminlte::page', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\quick-task\resources\views/admin/posts/index.blade.php ENDPATH**/ ?>