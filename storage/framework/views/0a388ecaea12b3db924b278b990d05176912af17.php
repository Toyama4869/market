<?php $__env->startSection('header'); ?>
<header>
<div class="header_top">
<img class="logo" src="<?php echo e(asset('images/logo.jpg')); ?>">
<form class="search" method="post" action="<?php echo e(route('posts.find')); ?>">
    <?php echo csrf_field(); ?>
    <input type="text" name="input" value="">
    <input class="button" type="submit" value="商品検索">
    </form>
    <ul class="header_nav">

        <li class="greeting">こんにちは、<?php echo e(\Auth::user()->name); ?>さん！</li>
        <li>
          <a href="<?php echo e(route('top', auth()->user()->id)); ?>">
          ホーム
          </a>
        </li>
         <li>
        <a href="<?php echo e(route('posts.create', auth()->user()->id)); ?>">
            新規出品</a>
        </li>
        <li>
          <a href="<?php echo e(route('users.show', auth()->user()->id)); ?>">
          プロフィール
          </a>
        </li>
        <li>
          <a href="<?php echo e(route('likes.index', auth()->user()->id)); ?>">
            お気に入り一覧
          </a>
        </li>
        <li>
          <a href="<?php echo e(route('users.exhibitions', auth()->user()->id)); ?>">
            出品商品一覧
          </a>
        </li>
        <li>
            <form action="<?php echo e(route('logout')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <input class="logout" type="submit" value="ログアウト">
            </form>
        </li>
    </ul>
    </div>
</header>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel\laravel_market\resources\views/layouts/logged_in.blade.php ENDPATH**/ ?>