

<?php $__env->startSection('title'); ?> Analytique <?php $__env->stopSection(); ?>

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
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="d-flex">
                            <div class="flex-shrink-0 me-3">
                                <img src="<?php echo e(isset(Auth::user()->avatar) ? asset(Auth::user()->avatar) : asset('/assets/images/users/avatar-1.jpg')); ?>" alt="" class="avatar-md rounded-circle img-thumbnail">
                            </div>
                            <div class="flex-grow-1 align-self-center">
                                <div class="text-muted">
                                    <p class="mb-2">Bienvenu sur Safety Analytique</p>
                                    <h5 class="mb-1"><?php echo e(Auth::user()->name ? Auth::user()->name : "Nom et Prénom"); ?></h5>
                                    <p class="mb-0"><?php echo e(Auth::user()->email ? Auth::user()->email : "Adresse email"); ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-4 align-self-center">
                        <div class="text-lg-center mt-4 mt-lg-0">
                            <div class="row">
                                <div class="col-4">
                                    <div>
                                        <p class="text-muted text-truncate mb-2">Règles</p>
                                        <h5 class="mb-0"><?php echo e($total_rules); ?></h5>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div>
                                        <p class="text-muted text-truncate mb-2">Quiz</p>
                                        <h5 class="mb-0"><?php echo e($total_quizzes); ?></h5>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div>
                                        <p class="text-muted text-truncate mb-2">Employés</p>
                                        <h5 class="mb-0"><?php echo e($total_employees); ?></h5>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-4 d-none d-lg-block">
                        <div class="clearfix mt-4 mt-lg-0">
                            <div class="dropdown float-end">
                                <button class="btn btn-primary" type="button">
                                    <i class="fa fa-edit"></i> Editer
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end row -->
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xl-8">
        <div class="row">
            
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <div class="clearfix">
                            <div class="float-end">
                                <div class="input-group input-group-sm">
                                    <select class="form-select form-select-sm">
                                        <option value="JA" selected>Jan</option>
                                        <option value="DE">Dec</option>
                                        <option value="NO">Nov</option>
                                        <option value="OC">Oct</option>
                                    </select>
                                    <label class="input-group-text">Moi</label>
                                </div>
                            </div>
                            <h4 class="card-title mb-4">Présence</h4>
                        </div>
                        
                        <div class="row">
                            <div>
                                <div id="line-chart" class="apex-charts" dir="ltr"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Quiz</h4>

                <ul class="nav nav-pills bg-light rounded" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-bs-toggle="tab" href="#transactions-all-tab" role="tab">Non pratiqué</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#transactions-buy-tab" role="tab">Mals pratiqués</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#transactions-sell-tab" role="tab">Bien pratiqués</a>
                    </li>
                </ul>
                <div class="tab-content mt-4">
                    <div class="tab-pane active" id="transactions-all-tab" role="tabpanel">
                        <div class="table-responsive" data-simplebar style="max-height: 260px;">
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
                                                <h5 class="font-size-14 mb-1"><?php echo e($quizNoAnswered->description); ?></h5>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="text-end">
                                                <a type="button" href="<?php echo e(route('categories.show', $quizNoAnswered->category)); ?>"
                                                    class="btn btn-success btn-rounded waves-effect waves-light "><i
                                                        class="mdi mdi-tag me-1"></i> <?php echo e($quizNoAnswered->category->name); ?>

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
                                                <h5 class="font-size-14 mb-1"><?php echo e($quizBadAnswered->description); ?></h5>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="text-end">
                                                <a type="button" href="<?php echo e(route('categories.show', $quizBadAnswered->category)); ?>"
                                                    class="btn btn-success btn-rounded waves-effect waves-light "><i
                                                        class="mdi mdi-tag me-1"></i> <?php echo e($quizBadAnswered->category->name); ?>

                                                </a>                                            
                                            </div>
                                        </td>

                                        <td>
                                            <div class="text-end">
                                                <h5 class="font-size-14 text-muted mb-0"><?php echo e($employee_quiz_responses_total != 0 ? $quizBadAnswered->employee_quiz_responses_count / $employee_quiz_responses_total * 100 : 0); ?>%</h5>
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
                                                <h5 class="font-size-14 mb-1"><?php echo e($quizGoodAnswered->description); ?></h5>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="text-end">
                                                <a type="button" href="<?php echo e(route('categories.show', $quizGoodAnswered->category)); ?>"
                                                    class="btn btn-success btn-rounded waves-effect waves-light "><i
                                                        class="mdi mdi-tag me-1"></i> <?php echo e($quizGoodAnswered->category->name); ?>

                                                </a>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="text-end">
                                                <h5 class="font-size-14 text-muted mb-0"><?php echo e($employee_quiz_responses_total != 0 ? $quizGoodAnswered->employee_quiz_responses_count / $employee_quiz_responses_total * 100 : 0); ?>%</h5>
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
</div>  

<div class="row">
    <div class="col-xl-4">
        <div class="card">
            <div class="card-body">
                <div class="d-flex flex-wrap align-items-start">
                    <div class="me-2">
                        <h5 class="card-title mb-3">Lecture par règle</h5>
                    </div>
                    <div class="dropdown ms-auto">
                        <a class="text-muted dropdown-toggle font-size-16" role="button" data-bs-toggle="dropdown" aria-haspopup="true">
                            <i class="mdi mdi-dots-horizontal"></i>
                        </a>
                        
                        <div class="dropdown-menu dropdown-menu-end">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <a class="dropdown-item" href="#">Something else here</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Separated link</a>
                        </div>
                    </div>
                </div>
                
                
                <hr>
                
                <div  data-simplebar style="max-height: 260px;">
                    <ul class="list-group list-group-flush">
                        <?php $__currentLoopData = $rulesMoreRead; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ruleMoreRead): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li class="list-group-item">
                            <div class="py-2">
                                <h5 class="font-size-14"><?php echo e($ruleMoreRead->description); ?><span class="float-end"><?php echo e(($total_readings != 0 ? $ruleMoreRead->readings_count * 100 / $total_readings : 0 ). '%'); ?></span></h5>
                                <div class="progress animated-progess progress-sm">
                                    <div class="progress-bar" role="progressbar" style="width: <?php echo e($total_readings != 0 ? $ruleMoreRead->readings_count * 100 / $total_readings : 0); ?>%" aria-valuenow="<?php echo e($ruleMoreRead->readings_count * 100 / $total_readings); ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-xl-4">
        <div class="card">
            <div class="card-body">
                <div class="d-flex flex-wrap align-items-start">
                    <div class="me-2">
                        <h5 class="card-title mb-3">Lecture par catégorie de règle</h5>
                    </div>
                    <div class="dropdown ms-auto">
                        <a class="text-muted dropdown-toggle font-size-16" role="button" data-bs-toggle="dropdown" aria-haspopup="true">
                            <i class="mdi mdi-dots-horizontal"></i>
                        </a>
                        
                        <div class="dropdown-menu dropdown-menu-end">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <a class="dropdown-item" href="#">Something else here</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Separated link</a>
                        </div>
                    </div>
                </div>
                
                
                <hr>
                <div data-simplebar style="max-height: 260px;">
                    <div class="row w-100 mb-4">
                        <div class="col-4 ps-4 font-size-16">
                            <?php $__currentLoopData = $categoriesMoreRead; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categoryMoreRead): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="m-4 text text-end">
                                <a type="button" href="<?php echo e(route('categories.show', $categoryMoreRead)); ?>"
                                    class="btn btn-success btn-rounded waves-effect waves-light "><i
                                         class="mdi mdi-tag me-1"></i> <?php echo e($categoryMoreRead->name); ?>

                                </a>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                        <div class="col-8">
                            <div class="smart-progress">
                                <?php $__currentLoopData = $categoriesMoreRead; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categoryMoreRead): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="progress-outer mt-4">
                                    <div class="progress animated-progess bg-white">
                                        <div class="progress-bar bg-success progress-bar-info" style="width:<?php echo e($total_readings != 0 ? $categoryMoreRead->readings_count * 100 / $total_readings : 0); ?>%;"></div>
                                        <div class="progress-value"><?php echo e($total_readings != 0 ? $categoryMoreRead->readings_count * 100 / $total_readings : 0); ?>%</div>
                                    </div>
                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Lecture par employé</h4>
            <div class="table-responsive" data-simplebar style="max-height: 260px;">
                <table class="table align-middle table-nowrap">
                    <tbody>
                        <?php $__currentLoopData = $bestEmployees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bestEmployee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td style="width: 50px;">
                                <div class="font-size-22 text-primary">
                                    1
                                </div>
                            </td>

                            <td>
                                <div>
                                    <h5 class="font-size-14 mb-1"><?php echo e($bestEmployee->employee->name); ?></h5>
                                </div>
                            </td>

                            <td>
                                <div>
                                    <h5 class="font-size-14 mb-1"><?php echo e($bestEmployee->employee->phone); ?></h5>
                                </div>
                            </td>

                            <td>
                                <div class="text-end">
                                    <h5 class="font-size-14 text-muted mb-0"><?php echo e($total_readings != 0 ? $bestEmployee->readings_count / $total_readings * 100 : 0); ?>%</h5>
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
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script src="<?php echo e(URL::asset('/assets/libs/apexcharts/apexcharts.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('/assets/libs/jquery-knob/jquery-knob.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('/assets/js/pages/jquery-knob.init.js')); ?>"></script>
<script src="<?php echo e(URL::asset('/assets/js/pages/saas-dashboard.init.js')); ?>"></script>
<script src="<?php echo e(URL::asset('/assets/js/pages/apexcharts.init.js')); ?>"></script>
<script src="<?php echo e(URL::asset('assets/js/essential_audio.js')); ?>"></script>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Ismae\Downloads\safetyapp_web\resources\views/analyze/index.blade.php ENDPATH**/ ?>