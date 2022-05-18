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
                        <p class="mb-4">Liste de reponses de l'utilisateur <strong class="text-info"><?php echo e($responses[0]->employee_name); ?></strong> pour le quiz <strong class="text-info"><?php echo e($responses[0]->quiz_name); ?></strong></p>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table align-middle ">
                        <thead>
                        <tr>
                            <th class="align-middle">Question</th>
                            <th class="align-middle">Reponse</th>
                            <th class="align-middle">Note</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $responses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $response): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>




                                <td>
                                    <div class="row">
                                                                                <div class="col-auto">

                                                                                    <img src="<?php echo e(URL::asset($response->quiz_question_image)); ?>" alt=""
                                                                                         class="avatar-md h-auto d-block rounded"/>
                                                                                </div>
                                        <div class="col-auto">
                                            <a href="<?php echo e(route('quiz_questions.show',$response->quiz_question_id)); ?>" class="">
                                                <p class="text-muted mb-0 text-justify"><?php echo e($response->quiz_question_description); ?></p>
                                            </a>
                                        </div>
                                    </div>

                                </td>

                                <td>
                                    <div class="row">
                                                                                <div class="col-auto">
                                                                                    <img src="<?php echo e(URL::asset($response->quiz_response_image)); ?>" alt=""
                                                                                         class="avatar-md h-auto d-block rounded"/>
                                                                                </div>
                                        <div class="col-auto">
                                            <p class="text-muted mb-3 mt-3 text-justify"><?php echo e($response->quiz_response_description); ?></p>

                                        </div>
                                    </div>
                                </td>

                                <td>
                                    <?php if($response->response_correct): ?>
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
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </tbody>
                    </table>


                </div>

                <?php echo e($responses->links('vendor.pagination.round')); ?>

            </div>
        </div>
        <!-- end card -->
    </div>

<?php $__env->stopSection(); ?>





<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\safetyapp\resources\views/employee_quiz_responses/employee.blade.php ENDPATH**/ ?>