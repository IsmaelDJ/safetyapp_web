

<?php $__env->startSection('title'); ?> Règles <?php $__env->stopSection(); ?>

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

<?php $__env->startSection('content'); ?>
<div class="col-xl-12">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title mb-4">Quiz</h4>
            
            <ul class="nav nav-pills bg-light rounded" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" data-bs-toggle="tab" href="#transactions-sell-tab" role="tab">Correcte</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="#transactions-buy-tab" role="tab">Faux</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="#transactions-all-tab" role="tab">Attente</a>
                </li>
            </ul>
            <div class="tab-content mt-4">
                <div class="tab-pane active" id="transactions-all-tab" role="tabpanel">
                    <div class="table-responsive" data-simplebar style="max-height: 340px;">
                        <table class="table align-middle table-nowrap">
                            <tbody>
                                <?php $__currentLoopData = $quizNoAnswereds; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $quizNoAnswered): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td style="width: 50px;">
                                        <div class="font-size-22 text-primary">
                                            <img src="<?php echo e(isset($quizNoAnswered->image) ? asset($quizNoAnswered->image) : asset('/assets/images/users/avatar-1.jpg')); ?>" alt="" class="avatar-sm rounded-circle img-thumbnail">
                                        </div>
                                    </td>
                                    
                                    <td>
                                        <div>
                                            <h5 class="font-size-14 mb-1"><?php echo e(str::limit($quizNoAnswered->description, $limit=20, $end='...')); ?> </h5>
                                        </div>
                                    </td>
                                    
                                    <td>
                                        <div class="text-end">
                                            <a type="button" href="<?php echo e(route('categories.show', $quizNoAnswered->category)); ?>"
                                                class="btn btn-success btn-rounded waves-effect waves-light "><i
                                                class="mdi mdi-tag me-1"></i> <?php echo e(Str::limit($quizNoAnswered->category->name, 4, '..')); ?>

                                            </a>                                             
                                        </div>
                                    </td>
                                    
                                    <td>
                                        <div class="text-end">
                                            <h5 class="font-size-14 text-muted mb-0">0 %</h5>
                                        </div>
                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="tab-pane" id="transactions-buy-tab" role="tabpanel">
                    <div class="table-responsive" data-simplebar style="max-height: 260px;">
                        <table class="table align-middle table-nowrap">
                            <tbody>
                                <?php $__currentLoopData = $quizBadAnswereds; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $quizBadAnswered): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td style="width: 50px;">
                                        <div class="font-size-22 text-primary">
                                            <img src="<?php echo e(isset($quizBadAnswered->image) ? asset($quizBadAnswered->image) : asset('/assets/images/users/avatar-1.jpg')); ?>" alt="" class="avatar-sm rounded-circle img-thumbnail">
                                        </div>
                                    </td>
                                    
                                    <td>
                                        <div>
                                            <h5 class="font-size-14 mb-1"><?php echo e(str::limit($quizBadAnswered->description, $limt=20, $end='...')); ?></h5>
                                        </div>
                                    </td>
                                    
                                    <td>
                                        <div class="text-end">
                                            <a type="button" href="<?php echo e(route('categories.show', $quizBadAnswered->category)); ?>"
                                                class="btn btn-success btn-rounded waves-effect waves-light "><i
                                                class="mdi mdi-tag me-1"></i> <?php echo e(str::limit($quizBadAnswered->category->name, $limit=4, $end='..')); ?>

                                            </a>                                            
                                        </div>
                                    </td>
                                    
                                    <td>
                                        <div class="text-end">
                                            <h5 class="font-size-14 text-muted mb-0"><?php echo e(round( $driver_quiz_responses_total != 0 ? $quizBadAnswered->driver_quiz_responses_count / $driver_quiz_responses_total * 100 : 0, 1)); ?>%</h5>
                                        </div>
                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                
                <div class="tab-pane" id="transactions-sell-tab" role="tabpanel">
                    <div class="table-responsive" data-simplebar style="max-height: 260px;">
                        <table class="table align-middle table-nowrap">
                            <tbody>
                                <?php $__currentLoopData = $quizGoodAnswereds; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $quizGoodAnswered): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td style="width: 50px;">
                                        <div class="font-size-22 text-primary">
                                            <img src="<?php echo e(isset($quizGoodAnswered->image) ? asset($quizGoodAnswered->image) : asset('/assets/images/users/avatar-1.jpg')); ?>" alt="" class="avatar-sm rounded-circle img-thumbnail">
                                        </div>
                                    </td>
                                    
                                    <td>
                                        <div>
                                            <h5 class="font-size-14 mb-1"><?php echo e(str::limit($quizGoodAnswered->description, $limit=20, $end='...')); ?></h5>
                                        </div>
                                    </td>
                                    
                                    <td>
                                        <div class="text-end">
                                            <a type="button" href="<?php echo e(route('categories.show', $quizGoodAnswered->category)); ?>"
                                                class="btn btn-success btn-rounded waves-effect waves-light "><i
                                                class="mdi mdi-tag me-1"></i> <?php echo e(str::limit($quizGoodAnswered->category->name, $limit=4, $end='..')); ?>

                                            </a>
                                        </div>
                                    </td>
                                    
                                    <td>
                                        <div class="text-end">
                                            <h5 class="font-size-14 text-muted mb-0"><?php echo e(round($driver_quiz_responses_total != 0 ? $quizGoodAnswered->driver_quiz_responses_count / $driver_quiz_responses_total * 100 : 0, 1)); ?>%</h5>
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
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\safetyapp_web\resources\views/analyze/quiz-details.blade.php ENDPATH**/ ?>