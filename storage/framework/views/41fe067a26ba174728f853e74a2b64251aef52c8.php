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
                        <h5 class="card-title mb-4">Liste des quiz</h5>
                    </div>

                    <div class="ms-auto">
                        <div class="text-sm-end">
                            <a type="button" href="<?php echo e(route('quiz_questions.create')); ?>"
                               class="btn btn-success btn-rounded waves-effect waves-light mb-2 me-2"><i
                                    class="mdi mdi-plus me-1"></i> Ajouter un quiz
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-12">
                    <div class="row">
                        <?php $__currentLoopData = $quiz_questions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $quiz_question): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="rule-item" style="width: 20%">
                            <div class="card mb-2 rounded" style="background-image:linear-gradient(0deg, rgba(0, 0, 0, 0.3), rgba(255, 255, 255, 0)), url(<?php echo e(URL::asset($quiz_question->image)); ?>); background-size: 100%; background-repeat: no-repeat; background-position: center;">
                                <div class="d-flex justify-content-end flex-column" style="height: 280px">
                                    <div class="me-1 align-self-end" 
                                        style="border-radius: 50%; background-color: <?php echo e($quiz_question->correct ? "#edf8ef" : "#ffe8e8"); ?>; min-width: 2.5rem; min-height: 2.5rem; display: flex; justify-content: center" 
                                        href="<?php echo e(route('quiz_questions.edit', $quiz_question)); ?>">
                                        <i class="fa fa-<?php echo e($quiz_question->correct ? "check" : "ban"); ?> fs-5" style="align-self: center; color:<?php echo e($quiz_question->correct ? "#34a543" : "#e80000"); ?>"></i> 
                                    </div>
                                    <a href="<?php echo e(route("quiz_questions.show", $quiz_question->id)); ?>" style="height: 100%; width: 100%;"></a>
                                    <div class="d-flex justify-content-between">
                                        <div class="d-xl-flex justify-content-between align-self-center">
                                            <div class="essential_audio m-3" data-url="<?php echo e(URL::asset($quiz_question->fr)); ?>"></div>
                                            <div class="essential_audio m-3" data-url="<?php echo e(URL::asset($quiz_question->ar)); ?>"></div>
                                            <div class="essential_audio m-3" data-url="<?php echo e(URL::asset($quiz_question->ng)); ?>"></div>
                                        </div>
        
                                        <div class="d-flex align-self-md-center align-self-end mb-2">
                                            <a class="me-1" 
                                                style="border-radius: 50%; background-color: #edf8ef; width: 1.5rem; height: 1.5rem; display: flex; justify-content: center" 
                                                href="<?php echo e(route('quiz_questions.edit', $quiz_question)); ?>">
                                                <i class="fa fa-pen" style="align-self: center; color: #34a543"></i> 
                                            </a>
                                            <a class="me-1" 
                                                style="border-radius: 50%; background-color: #ffe8e8; width: 1.5rem; height: 1.5rem; display: flex; justify-content: center" 
                                                href="<?php echo e(route('quiz_questions.index')); ?>"
                                                onclick="
                                                var result = confirm('Cette règle sera supprimée');
                                                if(result){
                                                    event.preventDefault();
                                                    document.getElementById('delete-form-<?php echo e($quiz_question->id); ?>').submit();
                                                }">
                                                <i class="fa fa-trash" style="align-self: center; color: #e80000"></i> 
                                            </a>
                                            <form method="POST" id="delete-form-<?php echo e($quiz_question->id); ?>"
                                                action="<?php echo e(route('quiz_questions.destroy', [$quiz_question])); ?>">
                                              <?php echo csrf_field(); ?>
                                              <input type="hidden" name="_method" value="DELETE">
                                          </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <p class="lead" style="font-size: 11px; text-align: justify"><?php echo e(Str::limit($quiz_question->description, 25)); ?></p>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>    
    
                        <div class="my-2">
                            <?php echo e($quiz_questions->links('vendor.pagination.round')); ?>

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


<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/chad/laravel-workspace/safetyapp_web/resources/views/quiz_questions/index.blade.php ENDPATH**/ ?>