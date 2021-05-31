<?php $__env->startSection('title', $title); ?>

<?php $__env->startSection('content'); ?>
<div class="form">
  <h2><?php echo e($title); ?></h2>
<ul>
    <?php $__empty_1 = true; $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
    <div class="post_body_second">
    <?php if($user->image !== ''): ?>
                        <img src="<?php echo e(asset('storage/'.$user->image)); ?>" alt="プロフィール画像">
                    <?php else: ?>
                        <img src="<?php echo e(asset('images/no_image.png')); ?>">
                    <?php endif; ?>
                </div>
        <li><?php echo e($user->name); ?>さん</li>
        <li><?php echo e($user->profile); ?></li>

        <li><a href="<?php echo e(route('users.edit')); ?>">プロフィール編集</a></li>
        <li><a href="<?php echo e(route('users.edit_image')); ?>">画像を変更</a></li>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
    <li>プロフィールが設定されていません。</li>
    <?php endif; ?>
</ul>

<h3>フォロー一覧</h3>

  <ul class="follow_users">
      <?php $__empty_1 = true; $__currentLoopData = $follow_users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $follow_user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
          <li class="follow_user">
              <div class="post_body_second">
            <?php if($follow_user->image !== ''): ?>
                <img src="<?php echo e(asset('storage/user_photos/' . $follow_user->image)); ?>">
            <?php else: ?>
                <img src="<?php echo e(asset('images/no_image.png')); ?>">
            <?php endif; ?>
              </div>
            <br>
            <?php echo e($follow_user->name); ?>

            <form method="post" action="<?php echo e(route('follows.destroy', $follow_user)); ?>" class="follow">
            <?php echo csrf_field(); ?>
            <?php echo method_field('delete'); ?>
            <input class="button" type="submit" value="フォロー解除">
          </form>
          </li>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
          <li>フォローしているユーザーはいません。</li>
      <?php endif; ?>
  </ul>


<h3>フォロワー一覧</h3>

  <ul class="followers">
      <?php $__empty_1 = true; $__currentLoopData = $followers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $follower): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
          <li class="follower">
            <?php if($follower->image !== ''): ?>
                <img src="<?php echo e(asset('storage/user_photos/' . $follower->image)); ?>">
            <?php else: ?>
                <img src="<?php echo e(asset('images/no_image.png')); ?>">
            <?php endif; ?>
            <?php echo e($follower->name); ?>

            <?php if(Auth::user()->isFollowing($follower)): ?>
              <form method="post" action="<?php echo e(route('follows.destroy', $follower)); ?>" class="follow">
                <?php echo csrf_field(); ?>
                <?php echo method_field('delete'); ?>
                <input class="button" type="submit" value="フォロー解除">
              </form>
            <?php else: ?>
              <form method="post" action="<?php echo e(route('follows.store')); ?>" class="follow">
                <?php echo csrf_field(); ?>
                <input type="hidden" name="follow_id" value="<?php echo e($follower->id); ?>">
                <input class="button" type="submit" value="フォロー">
              </form>
            <?php endif; ?>
          </li>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
          <li>フォローされているユーザーはいません。</li>
      <?php endif; ?>
  </ul>
  </div>
<?php $__env->stopSection(); ?>





<?php echo $__env->make('layouts.logged_in', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel\laravel_market\resources\views/users/show.blade.php ENDPATH**/ ?>