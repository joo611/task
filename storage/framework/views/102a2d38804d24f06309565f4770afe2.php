<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Daily Report - <?php echo e($today); ?></title>
</head>
<body>
    <h2>📊 Daily Report - <?php echo e($today); ?></h2>

    <h3>🧑 New Users</h3>
    <?php if($newUsers->isEmpty()): ?>
        <p>No new users today.</p>
    <?php else: ?>
        <ul>
            <?php $__currentLoopData = $newUsers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($user->name); ?> (<?php echo e($user->email); ?>) - Registered at <?php echo e($user->created_at->format('H:i')); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    <?php endif; ?>

    <h3>📝 New Posts</h3>
    <?php if($newPosts->isEmpty()): ?>
        <p>No new posts today.</p>
    <?php else: ?>
        <ul>
            <?php $__currentLoopData = $newPosts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($post->title); ?> by <?php echo e($post->user->name); ?> - Posted at <?php echo e($post->created_at->format('H:i')); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    <?php endif; ?>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\quick-task\resources\views/emails/daily_report.blade.php ENDPATH**/ ?>