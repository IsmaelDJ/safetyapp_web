


<?php $__env->startSection('title'); ?> Utilisateurs <?php $__env->stopSection(); ?>

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

    <!-- end col -->
    <div class="col-xl-8 ms-auto me-auto mt-5">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-start">
                    <div class="me-2">
                        <h5 class="card-title mb-4">L'analytique</h5>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table align-middle ">
                        <thead>
                        <tr>
                            <th class="text-center">N°</th>
                            <th scope="col">Chauffeur</th>
                            <th scope="col">Action</th>
                            <th class="text text-center"><span>Date</span></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <th scope="row"><?php echo e($loop->iteration); ?></th scope="row">
                                <td style="width: 30%">
                                    <p class="text-muted m-3 text-justify"><?php echo e($item->driver->name); ?></p>
                                </td>
                                <td >
                                    <?php if($item->type == 1): ?>
                                        <p class="text-muted m-1 text-justify"><a href="<?php echo e(route('quiz_questions.show', $item->action)); ?>">Quiz : <?php echo e(str::limit( $item->action->description, $limit = 100, $end = '...')); ?></a></p>
                                    <?php elseif($item->type == 2): ?>
                                    <p class="text-muted m-1 text-justify"><a href="<?php echo e(route('rules.show', $item->action)); ?>">Règle : <?php echo e(str::limit( $item->action->description, $limit = 100, $end = '...')); ?></a></p>
                                    <?php else: ?>
                                        <p class="text-muted m-1 text-justify"><?php echo e(str::limit( $item->action, $limit = 100, $end = '...')); ?></p>
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
        </div>
        <!-- end card -->
    </div>
    <!-- end col -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script>window.print()</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master-without-nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\safetyapp_web\resources\views/analyze/export-details.blade.php ENDPATH**/ ?>