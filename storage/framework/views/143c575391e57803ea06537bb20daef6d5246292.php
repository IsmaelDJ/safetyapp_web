

<?php $__env->startSection('title'); ?> Reponses <?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
<!-- Bootstrap Css -->
<link href="<?php echo e(URL::asset('/assets/css/bootstrap.min.css')); ?>" id="bootstrap-style" rel="stylesheet" type="text/css" />
<!-- Icons Css -->
<link href="<?php echo e(URL::asset('/assets/css/icons.min.css')); ?>" rel="stylesheet" type="text/css" />
<!-- App Css-->
<link href="<?php echo e(URL::asset('/assets/css/app.min.css')); ?>" id="app-style" rel="stylesheet" type="text/css" />

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<?php if(session()->has('success')): ?>
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <?php echo e(session('success')); ?>

    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php endif; ?>


<div class="col-xl-12">
    <div class="card">
        <div class="card-body">
            <div class="d-flex align-items-start">
                <div class="me-2">
                    <h5 class="card-title mb-4">List des chauffeur ordonne par reponses</h5>
                </div>

            </div>

            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th class="align-middle">chauffeur</th>
                        <th class="text text-center">Reponse Vraie</th>
                        <th class="text text-center">Reponse Faux</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $drivers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $driver): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td>
                            <a href="<?php echo e(route('drivers.show',$driver->id)); ?>">
                                <p class="text-muted mb-0 text-justify"><?php echo e($driver->name); ?></p>
                            </a>
                        </td>
                        <td>
                            <div class="row">
                                <div class="col-auto">
                                    <p class="text-muted mb-0 text-justify"><?php echo e($driver->correct_answers); ?></p>
                                </div>
                            </div>

                        </td>
                        <td>
                            <div class="row">
                                <div class="col-auto">
                                    <p class="text-muted mb-0 text-justify"><?php echo e($driver->incorrect_answers); ?></p>
                                </div>
                            </div>

                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </tbody>
            </table>


            <?php echo e($drivers->links('vendor.pagination.round')); ?>

        </div>
    </div>
    <!-- end card -->
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\www\ismatech\safetyapp_web\resources\views/driver_quiz_responses/rank.blade.php ENDPATH**/ ?>