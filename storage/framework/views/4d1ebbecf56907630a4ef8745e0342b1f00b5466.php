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
                        <p class="mb-4">Liste des reponses des Chauffeurs <strong class="text-info"><?php echo e($driver->name); ?></strong> pour tous les quiz</p>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table align-middle text-center">
                        <thead>
                        <tr>
                            <th class="text-start">Illustration</th>
                            <th class="align-middle">Descricarrierption</th>
                            <th class="align-middle">Reponse attendu</th>
                            <th class="align-middle">Reponse donnée</th>
                            <th class="align-middle">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $driverQuizResponses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $driverQuizResponse): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>

                                <td>
                                    <div class="row">
                                        <div class="col-auto">
                                            <img src="<?php echo e(URL::asset($driverQuizResponse->quiz_question->image)); ?>" alt=""
                                                    class="avatar-md h-auto d-block rounded"/>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="col-auto">
                                        <a href="<?php echo e(route('quiz_questions.show',$driverQuizResponse->quiz_question_id)); ?>" class="">
                                            <p class="text-muted mb-0 text-justify"><?php echo e($driverQuizResponse->quiz_question->description); ?></p>
                                        </a>
                                    </div>
                                    </div>

                                </td>
                                <td>
                                    <?php if($driverQuizResponse->quiz_question->correct): ?>
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
                                    <?php if($driverQuizResponse->correct): ?>
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

                                        <a href="<?php echo e(route('driver_quiz_responses.show', $driverQuizResponse)); ?>"
                                            class="btn btn-default">Détails
                                        </a>
                                        <a href="<?php echo e(route('driver_quiz_responses.edit', $driverQuizResponse)); ?>"
                                            class="btn btn-info">Modifier
                                        </a>

                                        <a href="<?php echo e(route('driver_quiz_responses.drivers', $driverQuizResponse->driver_id)); ?>" class="btn btn-danger"
                                            onclick="
                                                    var result = confirm('Cs Chauffeurs sera supprimée');
                                                    if(result){
                                                        event.preventDefault();
                                                        document.getElementById('delete-form').submit();
                                                    }
                                                    ">
                                            Supprimer</a>

                                        <form method="POST" id="delete-form"
                                                action="<?php echo e(route('driver_quiz_responses.destroy', [$driverQuizResponse])); ?>">
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

                <?php echo e($driverQuizResponses->links('vendor.pagination.round')); ?>

            </div>
        </div>
        <!-- end card -->
    </div>

<?php $__env->stopSection(); ?>





<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/chad/laravel-workspace/safetyapp_web/resources/views/driver_quiz_responses/driver.blade.php ENDPATH**/ ?>