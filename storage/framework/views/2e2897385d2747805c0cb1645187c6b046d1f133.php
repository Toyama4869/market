<?php $__env->startSection('title', $title); ?>

<?php $__env->startSection('content'); ?>
<div class="form">
  <h2><?php echo e($title); ?></h2>
  <h3><?php echo e($post->name); ?></h3>
  <ul>
        <li class="show_font">出品者名</li>
        <li><?php echo e($post->user->name); ?></li>
        <li class="show_font">画像</li>
        <img src="<?php echo e(asset('storage/' . $post->image)); ?>">
        <li class="show_font">カテゴリ</li>
        <li><?php echo e($post->category); ?></li>
        <li class="show_font">価格</li>
        <li><?php echo e($post->price); ?></li>
        <li class="show_font">説明</li>
        <li><?php echo e($post->description); ?></li>
   </ul>
            <a href="<?php echo e(route('posts.index')); ?>"><button class="button" type="button">トップに戻る</button></a>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.logged_in', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel\laravel_market\resources\views/posts/finish.blade.php ENDPATH**/ ?>