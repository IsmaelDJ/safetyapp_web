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
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-start">
                    <div class="me-2">
                        <h5 class="card-title mb-4">Liste des quiz non pratiqués</h5>
                    </div>

                    <div class="ms-auto">
                        <div class="text-sm-end">
                            <div class="btn-group">
                                <button type="button" class="btn btn-info btn-rounded waves-effect waves-light mb-2 dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Exporter <i class="mdi mdi-chevron-down"></i></button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="<?php echo e(route('analyze.export.xlsx.quiz.waitting')); ?>" >Format Excel</a>
                                    <a class="dropdown-item" href="<?php echo e(route('analyze.export.pdf.quiz.waitting')); ?>">Format PDF</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table align-middle ">
                        <thead>
                        <tr >
                            <th scope="col">Illustration</th>
                            <th scope="col">Reponse</th>
                            <th scope="col">Description</th>
                            <th class="col">Catégorie</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $quizzes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $quiz): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td style="width: 150px;">
                                    <img src="<?php echo e(URL::asset($quiz->image)); ?>" alt=""
                                                               class="avatar-md h-auto d-block rounded">
                                </td>
                                <td style="width: 250px">
                                    <?php if($quiz->correct): ?>

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
                                <td style="width: 250px">
                                    <p class="text-muted mb-0 text-justify"><?php echo e($quiz->description); ?></p>
                                </td>
                                <td class="d-none d-xl-table-cell">
                                    <a type="button" href="<?php echo e(route('categories.show', $quiz->category)); ?>"
                                       class="btn btn-success btn-rounded waves-effect waves-light mb-2 me-2"><i
                                            class="mdi mdi-tag me-1"></i> <?php echo e($quiz->category->name); ?>

                                    </a>
                                </td>
                                <td style="width: 200px">
                                    <div class="d-flex gap-3">

                                        <a href="<?php echo e(route('quiz_questions.show', $quiz)); ?>"
                                           class="btn btn-default">Détails
                                        </a>
                                        <a href="<?php echo e(route('quiz_questions.edit', $quiz )); ?>"
                                           class="btn btn-info">Modifier
                                        </a>

                                        <a href="<?php echo e(route('quiz_questions.show',$quiz)); ?>" class="btn btn-danger"
                                           onclick="
                                                   var result = confirm('Cette reponse sera supprimée');
                                                   if(result){
                                                       event.preventDefault();
                                                       document.getElementById('delete-form').submit();
                                                   }
                                                   ">
                                            Supprimer</a>

                                        <form method="POST" id="delete-form"
                                              action="<?php echo e(route('quiz_questions.destroy', [$quiz])); ?>">
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

                <?php echo e($quizzes->links('vendor.pagination.round')); ?>

            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>

    <script src="<?php echo e(URL::asset('assets/js/essential_audio.js')); ?>"></script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/chad/laravel-workspace/safetyapp_web/resources/views/analyze/quiz-waitting.blade.php ENDPATH**/ ?>