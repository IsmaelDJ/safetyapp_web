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
    <div class="col-md-6">
        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('chart-reading')->html();
} elseif ($_instance->childHasBeenRendered('Y8TkjDb')) {
    $componentId = $_instance->getRenderedChildComponentId('Y8TkjDb');
    $componentTag = $_instance->getRenderedChildComponentTagName('Y8TkjDb');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('Y8TkjDb');
} else {
    $response = \Livewire\Livewire::mount('chart-reading');
    $html = $response->html();
    $_instance->logRenderedChild('Y8TkjDb', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
    </div>
    <div class="col-md-6">
        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('chart-presence')->html();
} elseif ($_instance->childHasBeenRendered('D1QCW7c')) {
    $componentId = $_instance->getRenderedChildComponentId('D1QCW7c');
    $componentTag = $_instance->getRenderedChildComponentTagName('D1QCW7c');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('D1QCW7c');
} else {
    $response = \Livewire\Livewire::mount('chart-presence');
    $html = $response->html();
    $_instance->logRenderedChild('D1QCW7c', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
    </div>
</div>

<div class="row">
    <div class="col-xl-4">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-2 d-inline-block">Quiz</h4>
                <div class="btn-group float-end">
                    <button type="button" class="btn btn-primary btn-sm waves-effect waves-light mb-2 dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Détails <i class="mdi mdi-chevron-down"></i></button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="<?php echo e(route('analyze.quiz.correct')); ?>" >Correcte</a>
                        <a class="dropdown-item" href="<?php echo e(route('analyze.quiz.false')); ?>">Faux</a>
                        <a class="dropdown-item" href="<?php echo e(route('analyze.quiz.waitting')); ?>">Non pratiqué</a>
                    </div>
                </div>
                <hr>
                
                <div class="card-block">
                    <?php echo $quizChart->container(); ?>

                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title d-inline-block mb-2">Règles</h4>
                <div class="btn-group float-end">
                    <button type="button" class="btn btn-primary btn-sm waves-effect waves-light mb-2 dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Détails <i class="mdi mdi-chevron-down"></i></button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="<?php echo e(route('analyze.rule.read')); ?>" >Règles lus</a>
                        <a class="dropdown-item" href="<?php echo e(route('analyze.rule.notread')); ?>">Règles non lus</a>
                    </div>
                </div>

                <hr>
                
                <div class="card-block">
                    <?php echo $ruleChart->container(); ?>

                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title d-inline-block mb-2">Lecture par catégories</h4>
                <div class="btn-group float-end">
                    <a type="button"  class="btn btn-primary btn-sm waves-effect waves-light mb-2 dropdown-toggle" href="<?php echo e(route('analyze.category.read')); ?>">Détails</a>
                </div>

                <hr>
                
                <div class="card-block">
                    <?php echo $categorieReadingChart->container(); ?>

                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/highcharts/6.0.6/highcharts.js" charset="utf-8"></script>

<script src="<?php echo e(URL::asset('/assets/libs/jquery-knob/jquery-knob.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('/assets/js/pages/jquery-knob.init.js')); ?>"></script>
<script src="<?php echo e(URL::asset('assets/js/essential_audio.js')); ?>"></script>
<?php echo $readingChart->script(); ?>

<?php echo $quizChart->script(); ?>

<?php echo $ruleChart->script(); ?>

<?php echo $globalChart->script(); ?>

<?php echo $categorieReadingChart->script(); ?>

<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/chad/laravel-workspace/safetyapp_web/resources/views/analyze/index.blade.php ENDPATH**/ ?>