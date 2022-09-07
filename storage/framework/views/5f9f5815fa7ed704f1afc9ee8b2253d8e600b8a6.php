

<?php $__env->startSection('title'); ?> Search <?php $__env->stopSection(); ?>

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

    <?php if(session()->has('success')): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?php echo e(session('success')); ?>

            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>
    <!-- end col -->
    <br class="m-md-4">
    <div class="col-xl-10 offset-xl-1 col-md-10 offset-md-1 ">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-results-start">
                    <div class="me-2">
                        <?php if($data->isEmpty()): ?>
                            <h5 class="card-title m-4">Auccun resultat correspondant à ce terme de recherche</h5>
                        <?php else: ?>
                            <h5 class="card-title m-4">Resultat</h5>
                        <?php endif; ?>
                    </div> 
                </div>

                <div class="w-100">
                    <ul class="list-group">
                        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $result): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li class="list-group-item d-flex justify-content-between align-items-center p-4">
                            <span style="width: 400px; font-size: 14px;" class="text text-justify"> 
                                <?php if($result->type == 1): ?>
                                    <span class="badge bg-success btn-rounded p-2 mb-2" style="width: 80px;"><i class="mdi mdi-tag me-1"></i> Quiz </span> <br> <?php echo e(str::limit( $result->content->description, $limit = 150, $end = '...')); ?>

                                <?php else: ?>
                                    <span class="badge bg-primary btn-rounded p-2 mb-2" style="width: 80px;"><i class="mdi mdi-tag me-1"></i> Règle </span><br> <?php echo e(str::limit( $result->content->description, $limit = 150, $end = '...')); ?>

                                <?php endif; ?></span>
                            <span class="badge badge-primary badge-pill">
                                <?php if($result->type == 1): ?>
                                    <a href="<?php echo e(route('quiz_questions.show', $result->content)); ?>" style="border-radius: 4px;" class="btn btn-primary ">Details</a>
                                <?php else: ?>
                                    <a href="<?php echo e(route('rules.show', $result->content)); ?>" style="border-radius: 4px;" class="btn btn-primary ">Details</a>
                                <?php endif; ?>
                            </span>
                        </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            </div>
            <div class="card-footer">
                <?php echo e($data->links('vendor.pagination.round')); ?>

            </div>
        </div>
        <!-- end card -->
    </div>
    <!-- end col -->
<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Ismae\Downloads\safetyapp_web\resources\views/search/index.blade.php ENDPATH**/ ?>