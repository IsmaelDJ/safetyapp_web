<?php $__env->startSection('title'); ?> Reponses <?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
    <!-- Bootstrap Css -->
    <link href="<?php echo e(URL::asset('/assets/css/bootstrap.min.css')); ?>" id="bootstrap-style" rel="stylesheet"
          type="text/css"/>
    <!-- Icons Css -->
    <link href="<?php echo e(URL::asset('/assets/css/icons.min.css')); ?>" rel="stylesheet" type="text/css"/>
    <!-- App Css-->
    <link href="<?php echo e(URL::asset('/assets/css/app.min.css')); ?>" id="app-style" rel="stylesheet" type="text/css"/>

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
                        <h5 class="card-title mb-4">Liste de reponses des chauffeurs</h5>
                    </div>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('doAdvanced')): ?>
                    <div class="ms-auto">
                        <div class="text-sm-end">
                            <a type="button" href="<?php echo e(route('driver_quiz_responses.create')); ?>"
                               class="btn btn-success btn-rounded waves-effect waves-light mb-2 me-2"><i
                                    class="mdi mdi-plus me-1"></i> Ajouter
                            </a>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>

                <div class="table-responsive">
                    <table class="table align-middle ">
                        <thead>
                        <tr>
                            <th class="align-middle">chauffeur</th>
                            <th class="align-middle">Question</th>
                            <th class="text text-center">Reponse</th>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('doAdvanced')): ?>
                            <th class="align-middle">Actions</th>
                            <?php endif; ?>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $driverQuizResponses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $driverQuizResponse): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td>
                                    <a href="<?php echo e(route('drivers.show',$driverQuizResponse->driver_id)); ?>">
                                        <p class="text-muted mb-0 text-justify"><?php echo e($driverQuizResponse->driver->name); ?></p>
                                    </a>
                                </td>
                                <td>
                                    <div class="row">
                                        <div class="col-auto">
                                            <a href="<?php echo e(route('quiz_questions.show',$driverQuizResponse->quiz_question_id)); ?>" class="">
                                                <p class="text-muted mb-0 text-justify"><?php echo e($driverQuizResponse->quiz_question->description); ?></p>
                                            </a>
                                        </div>
                                    </div>

                                </td>

                                <td class="text text-center fs-3">
                                    <?php if($driverQuizResponse->correct): ?>
                                        <i
                                            class="mdi mdi-check me-1 text-success"></i>
                                    <?php else: ?>
                                        <i
                                            class="mdi mdi-close me-1 text-danger"></i>
                                    <?php endif; ?>
                                </td>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('doAdvanced')): ?>
                                <td style="width: 400px">
                                    <div class="d-flex gap-3">
                                        <a href="<?php echo e(route('driver_quiz_responses.drivers',[$driverQuizResponse->driver_id])); ?>"
                                           class="btn btn-primary">Détails
                                        </a>
                                        <div class="d-flex gap-3">
                                            <a href="<?php echo e(route('driver_quiz_responses.quizzes',[$driverQuizResponse->quiz_question_id])); ?>"
                                               class="btn btn-outline-secondary">Autres reponses
                                            </a>
                                        </div>
                                    </div>
                                </td>
                                <?php endif; ?>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </tbody>
                    </table>


                </div>

                <?php echo e($driverQuizResponses->links('vendor.pagination.round')); ?>

            </div>
        </div>
        <!-- end card -->
    </div>

<?php $__env->stopSection(); ?>





<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/chad/laravel-workspace/safetyapp_web/resources/views/driver_quiz_responses/index.blade.php ENDPATH**/ ?>