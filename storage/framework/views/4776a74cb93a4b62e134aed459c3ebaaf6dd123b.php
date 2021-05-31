<?php $__env->startSection('header'); ?>
<header>
    <ul class="header_nav">
        <li>
          <a href="<?php echo e(route('register')); ?>">
            ユーザー登録
          </a>
        </li>
        <li>
          <a href="<?php echo e(route('login')); ?>">
            ログイン
          </a>
        </li>
    </ul>
</header>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel\laravel_market\resources\views/layouts/not_logged_in.blade.php ENDPATH**/ ?>