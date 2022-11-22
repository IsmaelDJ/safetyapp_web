

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
                    <div class="ms-auto">
                        <div class="text-sm-end">
                            <a type="button" href="<?php echo e(route('driver_quiz_responses.create')); ?>"
                               class="btn btn-success btn-rounded waves-effect waves-light mb-2 me-2"><i
                                    class="mdi mdi-plus me-1"></i> Ajouter
                            </a>
                        </div>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table align-middle ">
                        <thead>
                        <tr>
                            <th class="align-middle">chauffeur</th>
                            <th class="align-middle">Quiz catégorie</th>
                            <th class="align-middle">Question</th>
                            <th class="align-middle">Reponse</th>
                            <th class="align-middle">Actions</th>
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
                                <td class="d-none d-xl-table-cell">
                                    <a type="button" href="<?php echo e(route('categories.show', $driverQuizResponse->quiz_question->category)); ?>"
                                       class="btn btn-success btn-rounded waves-effect waves-light mb-2 me-2"><i
                                            class="mdi mdi-tag me-1"></i> <?php echo e($driverQuizResponse->quiz_question->category->name); ?>

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

                                <td>
                                    <?php if($driverQuizResponse->correct): ?>
                                        <span
                                           class="btn btn-success btn-rounded waves-effect waves-light mb-2 me-2"><i
                                                class="mdi mdi-tag me-1"></i> Correct
                                        </span>
                                    <?php else: ?>
                                        <span
                                           class="btn btn-danger btn-rounded waves-effect waves-light mb-2 me-2"><i
                                                class="mdi mdi-tag me-1"></i> Faux
                                        </span>
                                    <?php endif; ?>
                                </td>
                                <td style="width: 400px">
                                    <div class="d-flex gap-3">
                                        <a href="<?php echo e(route('driver_quiz_responses.drivers',[$driverQuizResponse->driver_id])); ?>"
                                           class="btn btn-primary">Reponses du chauffeur
                                        </a>
                                        <div class="d-flex gap-3">
                                            <a href="<?php echo e(route('driver_quiz_responses.quizzes',[$driverQuizResponse->quiz_question_id])); ?>"
                                               class="btn btn-primary">Reponses à ce quiz
                                            </a>
                                        </div>
                                    </div>
                                </td>
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





<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\safetyapp_web\resources\views/driver_quiz_responses/index.blade.php ENDPATH**/ ?>