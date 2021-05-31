<?php $__env->startSection('content'); ?>


    <form action="posts.search" method="post">
    <?php echo csrf_field(); ?>
    <input type="text" name="input" value="<?php echo e($input); ?>">
    <input type="submit" value="find">
    </form>

    <?php if(isset($post)): ?>
    <?php echo e($post->getData()); ?>

    <?php endif; ?>


    

<?php echo $__env->make('layouts.logged_in', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel\laravel_market\resources\views/posts/search.blade.php ENDPATH**/ ?>