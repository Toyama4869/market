<?php $__env->startSection('content'); ?>
  <h1><?php echo e($title); ?></h1>

  <ul class="follow_users">
      <?php $__empty_1 = true; $__currentLoopData = $follow_users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $follow_user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
          <li class="follow_user">
            <?php if($follow_user->image !== ''): ?>
                <img src="<?php echo e(asset('storage/user_photos/' . $follow_user->image)); ?>">
            <?php else: ?>
                <img src="<?php echo e(asset('images/no_image.png')); ?>">
            <?php endif; ?>
            <br>
            <?php echo e($follow_user->name); ?>

            <form method="post" action="<?php echo e(route('follows.destroy', $follow_user)); ?>" class="follow">
            <?php echo csrf_field(); ?>
            <?php echo method_field('delete'); ?>
            <input type="submit" value="フォロー解除">
          </form>
          </li>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
          <li>フォローしているユーザーはいません。</li>
      <?php endif; ?>
  </ul>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.logged_in', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel\laravel_market\resources\views/follows/index.blade.php ENDPATH**/ ?>