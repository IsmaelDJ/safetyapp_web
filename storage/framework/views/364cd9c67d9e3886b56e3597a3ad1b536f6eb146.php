<?php $__env->startSection('title'); ?> Utilisateurs <?php $__env->stopSection(); ?>

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

    <div class="container-fluid">
        <div class="row">
                <div class="row">
                    <div class="col-xl-9">
                        <div class="row gap-3" >
                            <div class="card card-body">
                                <div class="row">
                                    <div class="col-xl-3">
                                        <img src="<?php echo e(URL::asset($employeeQuizResponse->quiz_question->image)); ?>" alt=""
                                             class="img-fluid d-block rounded">
                                        <h5 class="card-title"><?php echo e($employeeQuizResponse->quiz_question->description); ?></h5>
                                    </div>
                                    <div class="col-xl-6 m-auto">
                                        <div class="pb-4">
                                            <h5 class=" mt-4">Audio Français</h5>
                                            <div class="essential_audio" data-url="<?php echo e(URL::asset($employeeQuizResponse->quiz_question->fr)); ?>"></div>
                                        </div>
                                        <div class="mt-4 pb-4">
                                            <h5 class=" mt-4">Audio Arabe</h5>
                                            <div class="essential_audio" data-url="<?php echo e(URL::asset($employeeQuizResponse->quiz_question->ar)); ?>"></div>
                                        </div>
                                        <div class="mt-4 pb-4">
                                            <h5 class=" mt-4">Audio Ngambaye</h5>
                                            <div class="essential_audio" data-url="<?php echo e(URL::asset($employeeQuizResponse->quiz_question->ng)); ?>"></div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3">
                                        <div>
                                            <h5 class=" mt-4">Catégorie</h5>
                                            <a type="button" href="<?php echo e(route('categories.show', $employeeQuizResponse->quiz_question->category)); ?>"
                                               class="btn btn-success btn-rounded waves-effect waves-light mb-4 me-2"><i
                                                    class="mdi mdi-tag me-1"></i> <?php echo e($employeeQuizResponse->quiz_question->category->name); ?>

                                            </a>
                                        </div>
                                        <div class="mb-4">
                                            <h5 class=" mt-4">Reponse attendue</h5>
                                            <p class="lead mb-0 text-justify">
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
                                            </p>
                                        </div>
                                        <div class="mb-4">
                                            <h5 class=" mt-4">Reponse de l'utilisateur</h5>
                                            <p class="lead mb-0 text-justify">
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
                                            </p>                                        
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3">
                        <div class="card card-body">
                            <span class="tex text-muted pb-1">Nom</span>
                            <h4 class="lead mb-4"><?php echo e($employeeQuizResponse->employee->name); ?></h4>
                            <i class="mdi mdi-phone me-1 "></i><span class="text-muted">Tel</span>
                            <h4 class="lead mb-4"><?php echo e($employeeQuizResponse->employee->phone); ?></h4>
                            <i class="mdi mdi-map-marker me-1 "></i><span class="text-muted">Identifiant</span>
                            <h4 class="lead mb-4"><?php echo e($employeeQuizResponse->employee->uid); ?></h4>
                            <i class="mdi mdi-map-marker me-1 "></i><span class="text-muted">Mot de passe</span>
                            <h4 class="lead mb-4"><?php echo e($employeeQuizResponse->employee->password); ?></h4>
                        </div>
                    </div>
            </div>
            <div class="row">
                <div class="card">

                    <div class="card-body" style="height: 80vh">
                        <div class="d-flex align-items-start">
                            <div class="me-2">
                                <h5 class="card-title mb-4">Liste des reponses à ce quiz</h5>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="table align-middle text-center">
                                <thead>
                                <tr>
                                    <th class="text-start">Illustration</th>
                                    <th class="align-middle">Description</th>
                                    <th class="align-middle">Reponse attendue</th>
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
        
                                                <a href="<?php echo e(route('employee_quiz_responses.show', $employeeQuizResponse->employee_id)); ?>" class="btn btn-danger"
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
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>





<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Ismae\Downloads\safetyapp_web-master\safetyapp_web-master\resources\views/employee_quiz_responses/show.blade.php ENDPATH**/ ?>