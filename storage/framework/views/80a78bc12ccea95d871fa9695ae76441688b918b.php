<?php $__env->startSection('title'); ?> Quiz <?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
    <!-- Bootstrap Css -->
    <link href="<?php echo e(URL::asset('/assets/css/bootstrap.min.css')); ?>" id="bootstrap-style" rel="stylesheet"
          type="text/css"/>
    <!-- Icons Css -->
    <link href="<?php echo e(URL::asset('/assets/css/icons.min.css')); ?>" rel="stylesheet" type="text/css"/>
    <!-- App Css-->
    <link href="<?php echo e(URL::asset('/assets/css/app.min.css')); ?>" id="app-style" rel="stylesheet" type="text/css"/>
    <link href="<?php echo e(URL::asset('/assets/css/essential_audio.css')); ?>" id="essential_audio" rel="stylesheet" type="text/css"/>

<?php $__env->stopSection(); ?>

<?php if(session()->has('success')): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?php echo e(session('success')); ?>

        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>


<?php $__env->startSection('content'); ?>
    <?php if(session()->has('success')): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?php echo e(session('success')); ?>

            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-4">
                <div class="card">
                    <div class="card-body" style="height: 100vh;">
                        <img src="<?php echo e(URL::asset($quiz->image)); ?>" alt="" class="img-fluid rounded mb-4">
                        <h5 class="card-title"><?php echo e($quiz->name); ?></h5>
                    </div>
                </div>
            </div>
            <div class="col-8">

                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-start">
                            <div class="me-2">
                                <h5 class="card-title mb-4">Questions</h5>
                            </div>

                            <div class="ms-auto">
                                <div class="text-sm-end">
                                    <a type="button" href="<?php echo e(route('quiz_questions.create', $quiz)); ?>"
                                       class="btn btn-success btn-rounded waves-effect waves-light mb-2 me-2"><i
                                            class="mdi mdi-plus me-1"></i> Ajouter une question
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="table align-middle ">
                                <thead>
                                <tr>
                                    <th scope="col">Illustration</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Audio Français</th>
                                    
                                    
                                    <th scope="col">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $__currentLoopData = $quizQuestions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $quizQuestion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td style="width: 150px;"><img src="<?php echo e(URL::asset($quizQuestion->image)); ?>" alt=""
                                                                       class="avatar-md h-auto d-block rounded"></td>
                                        <td style="width: 250px">
                                            <p class="text-muted mb-0 text-justify"><?php echo e($quizQuestion->description); ?></p>
                                        </td>
                                        <td >
                                            <div class="essential_audio" data-url="<?php echo e(URL::asset($quizQuestion->fr)); ?>"></div>
                                        </td>
                                        
                                        
                                        
                                        
                                        
                                        
                                        <td style="width: 200px">
                                            <div class="d-flex gap-3">

                                                <a href="<?php echo e(route('quiz_questions.show', $quizQuestion)); ?>"
                                                   class="btn btn-default">Détails
                                                </a>
                                                <a href="<?php echo e(route('quiz_questions.edit', $quizQuestion )); ?>"
                                                   class="btn btn-info">Modifier
                                                </a>

                                                <a href="<?php echo e(route('quiz_questions.index')); ?>" class="btn btn-danger"
                                                   onclick="
                                                   var result = confirm('Cette question sera supprimée');
                                                   if(result){
                                                       event.preventDefault();
                                                       document.getElementById('delete-form').submit();
                                                   }
                                                   ">
                                                    Supprimer</a>

                                                <form method="POST" id="delete-form"
                                                      action="<?php echo e(route('quiz_questions.destroy', [$quizQuestion])); ?>">
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

                    </div>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>

    <script src="<?php echo e(URL::asset('assets/js/essential_audio.js')); ?>"></script>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\safetyapp\resources\views/quizzes/show.blade.php ENDPATH**/ ?>