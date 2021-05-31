<?php $__env->startSection('content'); ?>
<div class="form">
  <h1>ログイン</h1>

  <form method="POST" action="<?php echo e(route('login')); ?>">
      <?php echo csrf_field(); ?>
      <div>
          <label>
            メールアドレス:<br>
            <input type="email" name="email">
          </label>
      </div>

      <div>
          <label>
            パスワード:<br>
            <input type="password" name="password" >
          </label>
      </div>

      <input class="button" type="submit" value="ログイン">
  </form>
  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.not_logged_in', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel\laravel_market\resources\views/auth/login.blade.php ENDPATH**/ ?>