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
                        <p class="mb-4">Liste des utilisateurs ayant repondu au qiz : <strong class="text-info"><?php echo e($quizQuestion->description); ?></strong></p>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table align-middle text-center">
                        <thead>
                        <tr>
                            <th scope="col">Nom</th>
                            <th scope="col">Entreprise</th>
                            <th class="align-middle">Reponse attendu</th>
                            <th class="align-middle">Reponse donnée</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $employeeQuizResponses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employeeQuizResponse): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td style="width: 250px">
                                    <p class="text-muted mb-0 text-justify"><?php echo e($employeeQuizResponse->employee->name); ?></p>
                                </td>
                                <td>
                                    <div>
                                        <a href="<?php echo e(route('contractors.show', $employeeQuizResponse->employee->contractor)); ?>"
                                            class=" mb-2 me-2">

                                            <?php echo e($employeeQuizResponse->employee->contractor->name); ?>

                                        </a>
                                    </div>
                                </td>
                                <td>
                                    <?php if($employeeQuizResponse->quiz_question->correct): ?>
                                        <span
                                           class="btn btn-success btn-rounded waves-effect waves-light mb-2 me-2"><i
                                                class="mdi mdi-tag me-1"></i> Vrai
                                        </span>
                                    <?php else: ?>
                                        <span
                                           class="btn btn-danger btn-rounded waves-effect waves-light mb-2 me-2"><i
                                                class="mdi mdi-tag me-1"></i> Faux
                                        </span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php if($employeeQuizResponse->correct): ?>
                                        <span
                                            class="btn btn-success btn-rounded waves-effect waves-light mb-2 me-2"><i
                                                class="mdi mdi-tag me-1"></i> Vrai
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

                                        <a href="<?php echo e(route('employee_quiz_responses.show', $employeeQuizResponse)); ?>"
                                            class="btn btn-default">Détails
                                        </a>
                                        <a href="<?php echo e(route('employee_quiz_responses.edit', $employeeQuizResponse->employee)); ?>"
                                            class="btn btn-info">Modifier
                                        </a>

                                        <a href="<?php echo e(route('employee_quiz_responses.quizzes', $employeeQuizResponse->quiz_question_id)); ?>" class="btn btn-danger"
                                            onclick="
                                                    var result = confirm('Cette reponse au quiz sera supprimée');
                                                    if(result){
                                                        event.preventDefault();
                                                        document.getElementById('delete-form').submit();
                                                    }
                                                    ">
                                            Supprimer</a>

                                        <form method="POST" id="delete-form"
                                                action="<?php echo e(route('employee_quiz_responses.destroy', [$employeeQuizResponse])); ?>">
                                            <?php echo csrf_field(); ?>
                                            <input type="hidden" name="_method" value="DELETE">
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </tbody>
                    </table>    
                </div>

                <?php echo e(!!$employeeQuizResponses->links('vendor.pagination.round')); ?>

            </div>
        </div>
        <!-- end card -->
    </div>

<?php $__env->stopSection(); ?>





<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Ismae\Downloads\safetyapp_web-master\safetyapp_web-master\resources\views/employee_quiz_responses/quiz.blade.php ENDPATH**/ ?>