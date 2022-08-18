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
                        <h5 class="card-title mb-4">Liste de reponses des utilisateurs</h5>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table align-middle ">
                        <thead>
                        <tr>
                            <th class="align-middle">Utilisateur</th>
                            <th class="align-middle">Quiz</th>
                            <th class="align-middle">Question</th>
                            <th class="align-middle">Reponse</th>
                            <th class="align-middle">Note</th>
                            <th class="align-middle">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $responses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $response): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td>
                                    <a href="<?php echo e(route('employees.show',$response->employee_id)); ?>">
                                        <p class="text-muted mb-0 text-justify"><?php echo e($response->employee_name); ?></p>
                                    </a>
                                </td>



                                <td>
                                    <div class="row">





                                        <div class="col-auto">
                                            <a href="<?php echo e(route('quizzes.show',$response->quiz_id)); ?>">
                                                <p class="text-muted mb-0 text-justify"><?php echo e($response->quiz_name); ?></p>
                                            </a>
                                        </div>
                                    </div>

                                </td>



                                <td>
                                    <div class="row">





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
                                <td style="width: 200px">
                                    <div class="d-flex gap-3">
                                        <a href="<?php echo e(route('employee_quiz_responses.employee',[$response->employee_id,$response->quiz_id])); ?>"
                                           class="btn btn-primary">Toutes les reponses
                                        </a>
                                    </div>
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





<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\safetyapp\resources\views/employee_quiz_responses/index.blade.php ENDPATH**/ ?>