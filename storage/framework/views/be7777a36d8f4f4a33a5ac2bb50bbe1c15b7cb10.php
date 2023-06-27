<?php $__env->startSection('title'); ?> Question <?php $__env->stopSection(); ?>

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
    <div class="container-fluid p-4 pb-0 pt-0">
        <div class="row gap-3" >
            <div class="card card-body">
                <div class="row">
                    <div class="col-xl-3 ">
                        <img src="<?php echo e(URL::asset($quizQuestion->image)); ?>" alt=""
                             class="img-fluid d-block rounded">
                        <h5 class="card-title"><?php echo e($quizQuestion->name); ?></h5>
                    </div>
                    <div class="col-xl-8 m-auto">
                        <div>
                            <h5 class=" mt-4">Catégorie</h5>
                            <a type="button" href="<?php echo e(route('categories.show', $quizQuestion->category)); ?>"
                               class="btn btn-success btn-rounded waves-effect waves-light mb-4 me-2"><i
                                    class="mdi mdi-tag me-1"></i> <?php echo e($quizQuestion->category->name); ?>

                            </a>
                        </div>
                        <div class="mb-4">
                            <h5 class=" mt-4">Description</h5>
                            <p class="lead mb-0 text-justify"><?php echo e($quizQuestion->description); ?></p>
                        </div>
                        <div class="mt-4 pb-4 pt-4">
                            <h5 class=" mt-4">Audio Français</h5>
                            <div class="essential_audio mt-4" data-url="<?php echo e(URL::asset($quizQuestion->fr)); ?>"></div>
                        </div>
                        <div class="mt-4 pb-4">
                            <h5 class=" mt-4">Audio Arabe</h5>
                            <div class="essential_audio mt-4" data-url="<?php echo e(URL::asset($quizQuestion->ar)); ?>"></div>
                        </div>
                        <div class="mt-4 pb-4">
                            <h5 class=" mt-4">Audio Ngambaye</h5>
                            <div class="essential_audio mt-4" data-url="<?php echo e(URL::asset($quizQuestion->ng)); ?>"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-start">
                    <div class="me-2">
                        <h5 class="card-title mb-4">Liste des quiz</h5>
                    </div>

                    <div class="ms-auto">
                        <div class="text-sm-end">
                            <a type="button" href="<?php echo e(route('quiz_questions.create', $quizQuestion)); ?>"
                               class="btn btn-success btn-rounded waves-effect waves-light mb-2 me-2"><i
                                    class="mdi mdi-plus me-1"></i> Ajouter un quiz
                            </a>
                        </div>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table align-middle ">
                        <thead>
                        <tr >
                            <th scope="col">Illustration</th>
                            <th scope="col">Description</th>
                            <th scope="col">Catégorie</th>
                            <th scope="col">Audio Français</th>
                            <th scope="col">Audio Arabe</th>
                            <th scope="col">Audio Ngambaye</th>
                            <th scope="col">Reponse</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $quizQuestions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tmpQuizQuestion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td style="width: 150px;"><img src="<?php echo e(URL::asset($tmpQuizQuestion->image)); ?>" alt=""
                                                               class="avatar-md h-auto d-block rounded">
                                </td>
                                <td style="width: 250px">
                                    <p class="text-muted mb-0 text-justify"><?php echo e($tmpQuizQuestion->description); ?></p>
                                </td>
                                <td class="d-none d-xl-table-cell">
                                    <a type="button" href="<?php echo e(route('categories.show', $tmpQuizQuestion->category)); ?>"
                                       class="btn btn-success btn-rounded waves-effect waves-light mb-2 me-2"><i
                                            class="mdi mdi-tag me-1"></i> <?php echo e($tmpQuizQuestion->category->name); ?>

                                    </a>
                                </td>
                                <td >
                                    <div class="essential_audio" data-url="<?php echo e(URL::asset($tmpQuizQuestion->fr)); ?>"></div>
                                </td>
                                <td>
                                    <div class="essential_audio" data-url="<?php echo e(URL::asset($tmpQuizQuestion->ar)); ?>" ></div>
                                </td>
                                <td>
                                    <div class="essential_audio" data-url="<?php echo e(URL::asset($tmpQuizQuestion->ng)); ?>" ></div>
                                </td>
                                <td style="width: 250px">
                                    <?php if($tmpQuizQuestion->correct): ?>

                                        <a type="button" href="#"
                                           class="btn btn-success btn-rounded waves-effect waves-light mb-2 me-2"><i
                                                class="mdi mdi-tag me-1"></i> Correct
                                        </a>
                                    <?php else: ?>

                                        <a type="button" href="#"
                                           class="btn btn-danger btn-rounded waves-effect waves-light mb-2 me-2"><i
                                                class="mdi mdi-tag me-1"></i> Faux
                                        </a>
                                    <?php endif; ?>
                                </td>
                                <td style="width: 200px">
                                    <div class="d-flex gap-3">

                                        <a href="<?php echo e(route('quiz_questions.show', $tmpQuizQuestion)); ?>"
                                           class="btn btn-default">Détails
                                        </a>
                                        <a href="<?php echo e(route('quiz_questions.edit', $tmpQuizQuestion )); ?>"
                                           class="btn btn-info">Modifier
                                        </a>

                                        <a href="<?php echo e(route('quiz_questions.show',$tmpQuizQuestion)); ?>" class="btn btn-danger"
                                           onclick="
                                                   var result = confirm('Cette reponse sera supprimée');
                                                   if(result){
                                                       event.preventDefault();
                                                       document.getElementById('delete-form<?php echo e($tmpQuizQuestion->id); ?>').submit();
                                                   }
                                                   ">
                                            Supprimer</a>

                                        <form method="POST" id="delete-form<?php echo e($tmpQuizQuestion->id); ?>"
                                              action="<?php echo e(route('quiz_questions.destroy', [$tmpQuizQuestion])); ?>">
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

                <?php echo e($quizQuestions->links('vendor.pagination.round')); ?>

            </div>
        </div>
    </div>



<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>

    <script src="<?php echo e(URL::asset('assets/js/essential_audio.js')); ?>"></script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/chad/laravel-workspace/safetyapp_web/resources/views/quiz_questions/show.blade.php ENDPATH**/ ?>