<?php $__env->startSection('title', $title); ?>


<?php $__env->startSection('content'); ?>
<div class="form">


  <h2><?php echo e($title); ?></h2>
  
  
      
      <ul>
      <?php $__empty_1 = true; $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
      
            <li>出品者:<?php echo e($post->user->name); ?></li>
          <li><?php echo e($post->name); ?> <?php echo e($post->price); ?>円</li>
          <li>[<?php echo e($post->created_at); ?>]</li>
          <li><?php echo e($post->description); ?></li>
          
          <div class="post_body_second">
                    <?php if($post->image !== ''): ?>
                        <img src="<?php echo e(asset('storage/' . $post->image)); ?>">
                    <?php else: ?>
                        <img src="<?php echo e(asset('images/no_image.png')); ?>">
                    <?php endif; ?>
                    <a href="<?php echo e(route('posts.edit_image', $post)); ?>">画像を変更</a>
                  </div>
                  
            
          <li>[<a href="<?php echo e(route('posts.edit', $post)); ?>">編集</a>]
          <form method="post" class="delete" action="<?php echo e(route('posts.destroy', $post)); ?>">
              <?php echo csrf_field(); ?>
              <?php echo method_field('delete'); ?>
              <input class="button" type="submit" value="削除"></li>
            </form>
            
            <div class="post_comments">
                <span class="post_comments_header">コメント</span>
                <ul class="post_comments_body">
              <?php $__empty_2 = true; $__currentLoopData = $post->comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_2 = false; ?>
                <li><?php echo e($comment->user->name); ?>: <?php echo e($comment->body); ?></li>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_2): ?>
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
              <input class="button" type="submit" value="送信">
            </form>
                <div class="post_body_main_comment">
                    <?php echo e($post->comment); ?>

                </div>
            </div>
    
    </li>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
          <li>書き込みはありません。</li>
      <?php endif; ?>
</ul>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.logged_in', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel\laravel_market\resources\views/users/exhibitions.blade.php ENDPATH**/ ?>