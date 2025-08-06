<?php $__env->startSection('title', 'Add Post'); ?>

<?php $__env->startSection('content_header'); ?>
    <h1>Add Post</h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <form action="<?php echo e(route('admin.posts.store')); ?>" method="POST">
        <?php echo csrf_field(); ?>

        <div class="mb-3">
            <label>User</label>
            <select name="user_id" class="form-control" required>
                <option value="">-- Select User --</option>
                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($user->id); ?>" <?php echo e(old('user_id') == $user->id ? 'selected' : ''); ?>>
                        <?php echo e($user->username); ?>

                    </option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>

        <div class="mb-3">
            <label>Title</label>
            <input type="text" name="title" class="form-control" required value="<?php echo e(old('title')); ?>">
        </div>

        <div class="mb-3">
            <label>Description (max 2KB)</label>
            <textarea name="description" class="form-control" rows="5" maxlength="2048" required><?php echo e(old('description')); ?></textarea>
        </div>

        <div class="mb-3">
            <label>Phone</label>
            <input type="text" name="phone" class="form-control" required value="<?php echo e(old('phone')); ?>">
        </div>

        <button class="btn btn-primary">Create</button>
        <a href="<?php echo e(route('admin.posts.index')); ?>" class="btn btn-secondary">Cancel</a>
    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('adminlte::page', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\quick-task\resources\views/admin/posts/create.blade.php ENDPATH**/ ?>