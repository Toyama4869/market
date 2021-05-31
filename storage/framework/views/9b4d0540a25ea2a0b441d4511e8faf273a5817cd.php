<?php $__env->startSection('content'); ?>
<div class="form">
  <h1>ユーザー登録</h1>

  <form method="POST" action="<?php echo e(route('register')); ?>">
    <?php echo csrf_field(); ?>
    <div>
      <label>
        ユーザー名:
        <input type="text" name="name">
      </label>
    </div>

    <div>
      <label>
        メールアドレス:
        <input type="email" name="email">
      </label>
    </div>

    <div>
      <label>
        パスワード:
        <input type="password" name="password">
      </label>
    </div>

    <div>
      <label>
        パスワード（確認用）:
        <input type="password" name="password_confirmation" >
      </label>
    </div>

    <div>
      <input class="button"　type="submit" value="登録">
    </div>
  </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.not_logged_in', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel\laravel_market\resources\views/auth/register.blade.php ENDPATH**/ ?>