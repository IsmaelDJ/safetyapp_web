

<?php $__env->startSection('title'); ?> Analytique <?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
    <!-- Bootstrap Css -->
    <link href="<?php echo e(URL::asset('/assets/css/bootstrap.min.css')); ?>" id="bootstrap-style" rel="stylesheet"
          type="text/css"/>
    <!-- Icons Css -->
    <link href="<?php echo e(URL::asset('/assets/css/icons.min.css')); ?>" rel="stylesheet" type="text/css"/>
    <!-- App Css-->
    <link href="<?php echo e(URL::asset('/assets/css/app.min.css')); ?>" id="app-style" rel="stylesheet" type="text/css"/>
    <link href="<?php echo e(URL::asset('/assets/css/essential_audio.css')); ?>" id="essential_audio" rel="stylesheet" type="text/css"/>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="row">

    <div class="col-xl-9">
        <div class="card">
            <div class="card-body">
                <div class="clearfix">
                    <div class="float-end">
                        <div class="input-group input-group-sm">
                            <select class="form-select form-select-sm">
                                <option value="JA" selected>Jan</option>
                                <option value="DE">Dec</option>
                                <option value="NO">Nov</option>
                                <option value="OC">Oct</option>
                            </select>
                            <label class="input-group-text">Moi</label>
                        </div>
                    </div>
                    <h4 class="card-title mb-4">Présence</h4>
                </div>

                <div class="row">
                    <div>
                        <div id="line-chart" class="apex-charts" dir="ltr"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 card p-4">
       <h3 class="text text-muted text-center">Votre profil</h3>
       <hr class="text-center"/>
        <div class="card-body pt-4">
            <div class="card" style="flex-direction: row;align-self:center; flex:100%;">
                <img style="width: 30%;" src="<?php echo e(isset(Auth::user()->avatar) ? asset(Auth::user()->avatar) : asset('/assets/images/users/avatar-1.jpg')); ?>" alt="" class="card-img-top img-thumbnail rounded-circle">
                <div class="col-8 fs-5 card-body">
                    <div class="card-title"><?php echo e(Auth::user()->name? Auth::user()->name : 'Nom et Prénom'); ?></div>
                    <div class="card-text mt-4"><?php echo e(Auth::user()->email? Auth::user()->email : 'Adresse email'); ?></div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <a href="" class="btn btn-primary waves-effect waves-light btn">Editer<i class="mdi mdi-arrow-right ms-1"></i></a>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xl-2 col-sm-6 card ms-2">
        <div class="text-center pt-4" dir="ltr">
            <h5 class="font-size-20 mb-3">Quiz</h5>
            <hr>
            <input class="knob" data-width="200" data-angleoffset="90" data-linecap="round"
            data-readOnly=true data-fgcolor="#3eac00" value="35">
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(URL::asset('/assets/libs/apexcharts/apexcharts.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('/assets/libs/jquery-knob/jquery-knob.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('/assets/js/pages/jquery-knob.init.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('/assets/js/pages/saas-dashboard.init.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('assets/js/essential_audio.js')); ?>"></script>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Ismae\Downloads\safetyapp_web\resources\views/analyze/index.blade.php ENDPATH**/ ?>