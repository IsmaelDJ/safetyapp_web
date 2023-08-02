<?php $__env->startSection('title'); ?> Chauffeur <?php $__env->stopSection(); ?>

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
            <div class="col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <div class="mb-4">
                            <img src="<?php echo e(URL::asset($driver->avatar)); ?>" alt="avatar" class="img-fluid rounded  mb-2">
                            <h5 class="card-title"><?php echo e($driver->name); ?></h5>
                        </div>
                        <i class="mdi mdi-phone me-1 "></i><span class="text-muted">Tel</span>
                        <h4 class="lead mb-4"><?php echo e($driver->phone); ?></h4>
                        <i class="mdi mdi-key me-1 "></i><span class="text-muted">Clé OBC</span>
                        <h4 class="lead mb-4"><?php echo e($driver->obc); ?></h4>
                        <i class="mdi mdi-map-marker me-1 "></i><span class="text-muted">Mot de passe</span>
                        <h4 class="lead mb-4"><?php echo e($driver->password); ?></h4>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-4 text-center">Statistique</h4>
                        
                        <hr>
                        
                        <div class="row mt-4">
                            <span class="fw-bold col-xl-12 text-center">Règles Lus </span>
                            <span class="text text-muted col text-center"><?php echo e($total_rules); ?></span>
                        </div>
                        <div class="row mt-4">
                            <span class="fw-bold col-xl-12 text-center">Quiz pratiqués </span>
                            <span class="text text-muted col text-center"><?php echo e($total_quizzes); ?></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-9">
                <div class="row">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="">Taux de lecture par mois</h4>
                            <hr>
                            <div>
                                <?php echo $readingChart->container(); ?>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-start">
                                <div class="me-2">
                                    <h5 class="card-title mb-4">Détails</h5>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table align-middle ">
                                    <thead>
                                    <tr>
                                        <th scope="col">Action</th>
                                        <th class="text text-center"><span>Date</span></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td >
                                                <?php if($item->type == 1): ?>
                                                    <p class="text-muted m-1 text-justify"><a href="<?php echo e(route('quiz_questions.show', $item->action)); ?>">Quiz : <?php echo e(Str::limit( $item->action->description, $limit = 100, $end = '...')); ?></a></p>
                                                <?php elseif($item->type == 2): ?>
                                                <p class="text-muted m-1 text-justify"><a href="<?php echo e(route('rules.show', $item->action)); ?>">Règle : <?php echo e(Str::limit( $item->action->description, $limit = 100, $end = '...')); ?></a></p>
                                                <?php else: ?>
                                                    <p class="text-muted m-1 text-justify"><?php echo e(Str::limit( $item->action, $limit = 100, $end = '...')); ?></p>
                                                <?php endif; ?>
                                            </td>
                            
                                            <td style="width: 20%;">
                                                <p class="text-muted m-1 text-center"><?php echo e($item->created_at); ?></p>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer">
                            <?php echo e($data->links('vendor.pagination.round')); ?>

                        </div>
                    </div> 
                </div>
            </div>
        </div>
        
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/highcharts/6.0.6/highcharts.js" charset="utf-8"></script>
<?php echo $readingChart->script(); ?>

<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/chad/laravel-workspace/safetyapp_web/resources/views/drivers/show.blade.php ENDPATH**/ ?>