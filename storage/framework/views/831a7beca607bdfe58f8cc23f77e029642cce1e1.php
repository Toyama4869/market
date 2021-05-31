<?php $__env->startSection('content'); ?>
    <h1><?php echo e($title); ?></h1>
    <h2>現在の画像</h2>
    <?php if($user->image !== ''): ?>
        
        <img src="<?php echo e(asset('storage/'.$user->image)); ?>" alt="プロフィール画像">
    <?php else: ?>
        画像はありません。
    <?php endif; ?>
    <form
        method="POST"
        action="<?php echo e(route('users.update_image', $user)); ?>"
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
        <input type="submit" value="更新">
    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.logged_in', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel\laravel_market\resources\views/users/edit_image.blade.php ENDPATH**/ ?>