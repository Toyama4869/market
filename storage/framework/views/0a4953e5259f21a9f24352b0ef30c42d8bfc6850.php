<?php $__env->startSection('content'); ?>
<div class="form">
    <h2><?php echo e($title); ?></h2>
    <h3>現在の画像</h3>
    <?php if($post->image !== ''): ?>
        <img src="<?php echo e(\Storage::url($post->image)); ?>">
    <?php else: ?>
        画像はありません。
    <?php endif; ?>
    <form
        method="POST"
        action="<?php echo e(route('posts.update_image', $post)); ?>"
        enctype="multipart/form-data"
    >
        <?php echo csrf_field(); ?>
        <?php echo method_field('patch'); ?>
        <div>
            <label>
                画像を選択:
                <input type="file" name="image">
            </label>
        </div>
        <input class="button" type="submit" value="更新">
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.logged_in', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel\laravel_market\resources\views/posts/edit_image.blade.php ENDPATH**/ ?>