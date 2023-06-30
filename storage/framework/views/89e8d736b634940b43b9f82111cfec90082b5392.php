<?php echo $__env->yieldContent('css'); ?>

<!-- Bootstrap Css -->
<link href="<?php echo e(URL::asset('/assets/css/bootstrap.min.css')); ?>" id="bootstrap-style" rel="stylesheet" type="text/css" />
<!-- Icons Css -->
<link href="<?php echo e(URL::asset('/assets/css/icons.min.css')); ?>" rel="stylesheet" type="text/css" />
<!-- App Css-->
<link href="<?php echo e(URL::asset('/assets/css/app.min.css')); ?>" id="app-style" rel="stylesheet" type="text/css" />

<style>
  div.essential_audio > div:nth-child(1) div {
      width: 1.3rem !important;
      height: 1.3rem !important;
      background-color: rgba(16, 204, 101, 0.5);
  }
  div.essential_audio > div:nth-child(1) div:after {
      width: 1.1rem !important;
      height: 1.1rem !important;
  }


  div.essential_audio > div:nth-child(1) div.play {
      background-color:  rgb(231, 107, 85, 0.3) !important;
  }
</style><?php /**PATH /home/chad/laravel-workspace/safetyapp_web/resources/views/layouts/head-css.blade.php ENDPATH**/ ?>