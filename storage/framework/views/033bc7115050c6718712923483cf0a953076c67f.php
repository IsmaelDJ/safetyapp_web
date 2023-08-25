<?php $__env->startSection('title'); ?> Utilisateurs <?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
    <!-- Bootstrap Css -->
    <link href="<?php echo e(URL::asset('/assets/css/bootstrap.min.css')); ?>" id="bootstrap-style" rel="stylesheet"
          type="text/css"/>
    <!-- Icons Css -->
    <link href="<?php echo e(URL::asset('/assets/css/icons.min.css')); ?>" rel="stylesheet" type="text/css"/>
    <!-- App Css-->
    <link href="<?php echo e(URL::asset('/assets/css/app.min.css')); ?>" id="app-style" rel="stylesheet" type="text/css"/>
    <link href="<?php echo e(URL::asset('/assets/css/essential_audio.css')); ?>" id="essential_audio" rel="stylesheet"
    type="text/css"/>
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
                                        <img src="<?php echo e(URL::asset($driverQuizResponse->quiz_question->image)); ?>" alt=""
                                             class="img-fluid d-block rounded">
                                        <h5 class="card-title mt-2"><?php echo e($driverQuizResponse->quiz_question->description); ?></h5>
                                    </div>
                                    <div class="col-xl-4 mx-auto">
                                        <div class="pb-4">
                                            <h5 class="mt-2">Audio Français</h5>
                                            <div class="essential_audio mt-4" data-url="<?php echo e(URL::asset($driverQuizResponse->quiz_question->fr)); ?>"></div>
                                        </div>
                                        <div class="mt-4 pb-4">
                                            <h5 class=" mt-4">Audio Arabe</h5>
                                            <div class="essential_audio mt-4" data-url="<?php echo e(URL::asset($driverQuizResponse->quiz_question->ar)); ?>"></div>
                                        </div>
                                        <div class="mt-4">
                                            <h5 class=" mt-4">Audio Ngambaye</h5>
                                            <div class="essential_audio mt-4" data-url="<?php echo e(URL::asset($driverQuizResponse->quiz_question->ng)); ?>"></div>
                                        </div>
                                    </div>
                                    <div class="col-xl-4">
                                        <div>
                                            <h5 class=" mt-2">Catégorie</h5>
                                            <a type="button" href="<?php echo e(route('categories.show', $driverQuizResponse->quiz_question->category)); ?>"
                                               class="btn btn-success btn-rounded waves-effect waves-light mb-4 me-2"><i
                                                    class="mdi mdi-tag me-1"></i> <?php echo e($driverQuizResponse->quiz_question->category->name); ?>

                                            </a>
                                        </div>
                                        <div class="mb-4">
                                            <h5 class="mt-2">Reponse attendue</h5>
                                            <p class="lead mb-0 text-justify">
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
                                            </p>
                                        </div>
                                        <div>
                                            <h5 class=" mt-4">Reponse de l'utilisateur</h5>
                                            <p class="lead mb-0 text-justify">
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
                                            </p>                                        
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3">
                        <div class="card card-body">
                            <span class="tex text-muted pb-1"><i class="mdi mdi-account me-1 "></i>Nom</span>
                            <h4 class="lead mb-4"><?php echo e($driverQuizResponse->driver->name); ?></h4>
                            <span class="text-muted"><i class="mdi mdi-phone me-1 "></i> Tel</span>
                            <h4 class="lead mb-4"><?php echo e($driverQuizResponse->driver->phone); ?></h4>
                            <span class="text-muted"><i class="mdi mdi-map-marker me-1 "></i> Identifiant</span>
                            <h4 class="lead mb-4"><?php echo e($driverQuizResponse->driver->uid); ?></h4>
                            <span class="text-muted"><i class="mdi mdi-key me-1 "></i> Mot de passe</span>
                            <h4 class="lead mb-4"><?php echo e($driverQuizResponse->driver->password); ?></h4>
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
                                            <?php if($driverQuizResponse->correct === $driverQuizResponse->quiz_question->correct): ?>
                                                <i
                                                    class="mdi mdi-check me-1 text-success"></i>
                                            <?php else: ?>
                                                <i
                                                    class="mdi mdi-close me-1 text-danger"></i>
                                            <?php endif; ?>
                                        </td>
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('doAdvanced')): ?>
                                        <td style="width: 300px">
                                            <div class="d-flex gap-3">
                                                <a href="<?php echo e(route('driver_quiz_responses.show',[$driverQuizResponse->id])); ?>"
                                                   class="btn btn-primary">Détails
                                                </a>
                                                <div class="d-flex gap-3">
                                                    <a href="<?php echo e(route('driver_quiz_responses.drivers',[$driverQuizResponse->driver_id])); ?>"
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
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>

    <script src="<?php echo e(URL::asset('assets/js/essential_audio.js')); ?>"></script>
<?php $__env->stopSection(); ?>




<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/chad/laravel-workspace/safetyapp_web/resources/views/driver_quiz_responses/show.blade.php ENDPATH**/ ?>