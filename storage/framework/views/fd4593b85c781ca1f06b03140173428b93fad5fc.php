<?php $__env->startSection('title', $title); ?>

<?php $__env->startSection('content'); ?>
<div class="body">
  <h3 class="title_likes"><?php echo e($title); ?></h3>

      <?php $__empty_1 = true; $__currentLoopData = $like_posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
      <div class="index">
                  <div class="post_body_main_img">
                    <?php if($post->image !== ''): ?>
                        <a href="<?php echo e(route('posts.show', $post->id)); ?>">
                            <img src="<?php echo e(asset('storage/' . $post->image)); ?>"></a>
                    <?php else: ?>
                        <a href="<?php echo e(route('posts.show')); ?>">
                            <img src="<?php echo e(asset('images/no_image.png')); ?>"></a>
                    <?php endif; ?>
                    </div>
       <ul class="posts">
      <li class="post">
            <h5><?php echo e($post->name); ?></h5>
            <li>出品者:<?php echo e($post->user->name); ?></li>
            <?php if(Auth::user()->isFollowing($post->user)): ?>
          <form method="post" action="<?php echo e(route('follows.destroy', $post)); ?>" class="follow">
            <?php echo csrf_field(); ?>
            <?php echo method_field('delete'); ?>
            <input class="button" type="submit" value="フォロー解除">
          </form>
        <?php else: ?>
          <form method="post" action="<?php echo e(route('follows.store')); ?>" class="follow">
            <?php echo csrf_field(); ?>
            <input type="hidden" name="follow_id" value="<?php echo e($post->id); ?>">
            <input class="button" type="submit" value="フォロー">
          </form>
        <?php endif; ?>
          <li><?php echo e($post->price); ?>円</li>
          <li>[<?php echo e($post->created_at); ?>]</li>
          <li><?php echo e($post->description); ?></li>
            <div class="post_body_footer">
                <a class="like_button"><?php echo e($post->isLikedBy(Auth::user()) ? '♥' . 'いいね！' : '♡' .  'いいね！'); ?></a>
                  <form method="post" class="like" action="<?php echo e(route('posts.toggle_like', $post)); ?>">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('patch'); ?>
                  </form>
            </div>
</div>
    </li>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
          <li>書き込みはありません。</li>
      <?php endif; ?>

</div>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.logged_in', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel\laravel_market\resources\views/likes/index.blade.php ENDPATH**/ ?>