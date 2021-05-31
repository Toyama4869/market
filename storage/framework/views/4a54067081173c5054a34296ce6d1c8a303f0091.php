<?php $__env->startSection('title', $title); ?>

<?php $__env->startSection('content'); ?>
<div class="form">
  <h2><?php echo e($title); ?></h2>
  
  <form method="POST" action="<?php echo e(route('users.update', $user)); ?>">
      <?php echo csrf_field(); ?>
      <?php echo method_field('patch'); ?>
      <div>
          <label>
            名前:
            <input type="text" name="name" value="<?php echo e($user->name); ?>">
          </label>
          </div>
          <div>
          <label>
            メールアドレス:
            <input type="text" name="email" value="<?php echo e($user->email); ?>">
          </label>
          </div>
          <div>
          <label>
            プロフィール:
            <textarea class="profile" name="profile" type="text" value="<?php echo e($user->profile); ?>"></textarea>          </label>
      </div>

      <input class="button" type="submit" value="更新">
  </form>
  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.logged_in', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel\laravel_market\resources\views/users/edit.blade.php ENDPATH**/ ?>