<?php $__env->startSection('title', $title); ?>

<?php $__env->startSection('content'); ?>
   <div class="form">
       <h2><?php echo e($title); ?></h2>
    <ul>
        <h3><li><?php echo e($post->name); ?></li></h3>
        <li class="show_font">出品者名：<?php echo e($post->user->name); ?></li>
        <img class="show_item" src="<?php echo e(asset('storage/' . $post->image)); ?>">
        <li class="show_font">カテゴリ：<?php echo e($post->category); ?></li>
        <li class="show_font">価格：<?php echo e($post->price); ?>円</>
        <li class="show_font">商品説明</li>
        <li><?php echo e($post->description); ?></li>
   </ul>

   <div class="post_comments">
                <span class="post_comments_header">コメント</span>
                <ul class="post_comments_body">
              <?php $__empty_1 = true; $__currentLoopData = $post->comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <li><?php echo e($comment->user->name); ?>: <?php echo e($comment->body); ?></li>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <li>コメントはありません。</li>
              <?php endif; ?>
            </ul>
            <form method="post" action="<?php echo e(route('comments.store')); ?>">
              <?php echo csrf_field(); ?>
              <input type="hidden" name="post_id" value="<?php echo e($post->id); ?>">
              <label>
                コメントを追加:
                <input type="text" name="body">
              </label>
              <input class='button' type="submit" value="送信">
            </form>
                <div class="post_body_main_comment">
                    <?php echo e($post->comment); ?>

                </div>
            </div>
            <a href="<?php echo e(route('posts.finish', $post->id)); ?>"><button class="confirm_button" type="button">内容を確認し、購入する</button></a>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.logged_in', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel\laravel_market\resources\views/posts/confirm.blade.php ENDPATH**/ ?>