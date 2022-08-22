

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
                        <p class="mb-4">Liste des reponses de l'utilisateur <strong class="text-info"><?php echo e($employee->name); ?></strong> pour tous les quiz</p>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table align-middle text-center">
                        <thead>
                        <tr>
                            <th class="text-start">Illustration</th>
                            <th class="align-middle">Description</th>
                            <th class="align-middle">Reponse attendu</th>
                            <th class="align-middle">Reponse donnée</th>
                            <th class="align-middle">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $employeeQuizResponses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employeeQuizResponse): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>

                                <td>
                                    <div class="row">
                                        <div class="col-auto">
                                            <img src="<?php echo e(URL::asset($employeeQuizResponse->quiz_question->image)); ?>" alt=""
                                                    class="avatar-md h-auto d-block rounded"/>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="col-auto">
                                        <a href="<?php echo e(route('quiz_questions.show',$employeeQuizResponse->quiz_question_id)); ?>" class="">
                                            <p class="text-muted mb-0 text-justify"><?php echo e($employeeQuizResponse->quiz_question->description); ?></p>
                                        </a>
                                    </div>
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
                                        <a href="<?php echo e(route('employee_quiz_responses.edit', $employeeQuizResponse)); ?>"
                                            class="btn btn-info">Modifier
                                        </a>

                                        <a href="<?php echo e(route('employee_quiz_responses.employees', $employeeQuizResponse->employee_id)); ?>" class="btn btn-danger"
                                            onclick="
                                                    var result = confirm('Cet utilisateur sera supprimée');
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

                <?php echo e($employeeQuizResponses->links('vendor.pagination.round')); ?>

            </div>
        </div>
        <!-- end card -->
    </div>

<?php $__env->stopSection(); ?>





<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Ismae\Downloads\safetyapp_web\resources\views/employee_quiz_responses/employee.blade.php ENDPATH**/ ?>