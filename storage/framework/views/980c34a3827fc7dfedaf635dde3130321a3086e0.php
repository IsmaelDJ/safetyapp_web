

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
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="d-flex">
                            <div class="flex-shrink-0 me-3">
                                <img src="<?php echo e(isset(Auth::user()->avatar) ? asset(Auth::user()->avatar) : asset('/assets/images/users/avatar-1.jpg')); ?>" alt="" class="avatar-md rounded-circle img-thumbnail">
                            </div>
                            <div class="flex-grow-1 align-self-center">
                                <div class="text-muted">
                                    <p class="mb-2">Bienvenu sur Safety Analytique</p>
                                    <h5 class="mb-1"><?php echo e(Auth::user()->name ? Auth::user()->name : "Nom et Prénom"); ?></h5>
                                    <p class="mb-0"><?php echo e(Auth::user()->email ? Auth::user()->email : "Adresse email"); ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-4 align-self-center">
                        <div class="text-lg-center mt-4 mt-lg-0">
                            <div class="row">
                                <div class="col-4">
                                    <div>
                                        <p class="text-muted text-truncate mb-2">Règles</p>
                                        <h5 class="mb-0"><?php echo e($total_rules); ?></h5>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div>
                                        <p class="text-muted text-truncate mb-2">Quiz</p>
                                        <h5 class="mb-0"><?php echo e($total_quizzes); ?></h5>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div>
                                        <p class="text-muted text-truncate mb-2">Employés</p>
                                        <h5 class="mb-0"><?php echo e($total_employees); ?></h5>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-4 d-none d-lg-block">
                        <div class="clearfix mt-4 mt-lg-0">
                            <div class="dropdown float-end">
                                <button class="btn btn-primary" type="button">
                                    <i class="fa fa-edit"></i> Editer
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end row -->
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xl-8">
        <div class="row">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <h4 class="card-title mb-4">Taux de lecture par moi</h4>
                    
                    <hr>
                   <div class="apex-charts">
                    <?php echo $readingChart->container(); ?>

                   </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Statut global</h4>
                
                <hr>
                
                <div class="card-block">
                    <?php echo $globalChart->container(); ?>

                </div>
            </div>
        </div>
    </div>
</div>  

<div class="row">
    <div class="col-xl-4">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Quiz</h4>
                
                <hr>
                
                <div class="card-block">
                    <?php echo $quizChart->container(); ?>

                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Règles</h4>
                
                <hr>
                
                <div class="card-block">
                    <?php echo $ruleChart->container(); ?>

                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Employée</h4>
                
                <hr>
                
                <div class="card-block">
                    <?php echo $categorieReadingChart->container(); ?>

                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<?php echo $readingChart->script(); ?>

<?php echo $quizChart->script(); ?>

<?php echo $ruleChart->script(); ?>

<?php echo $globalChart->script(); ?>

<?php echo $categorieReadingChart->script(); ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/highcharts/6.0.6/highcharts.js" charset="utf-8"></script>
<script src="<?php echo e(URL::asset('/assets/libs/jquery-knob/jquery-knob.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('/assets/js/pages/jquery-knob.init.js')); ?>"></script>
<script src="<?php echo e(URL::asset('assets/js/essential_audio.js')); ?>"></script>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Ismae\Downloads\safetyapp_web\resources\views/analyze/index.blade.php ENDPATH**/ ?>