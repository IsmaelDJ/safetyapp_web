

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

    <?php if(session()->has('success')): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?php echo e(session('success')); ?>

            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>
    <!-- end col -->
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-start">
                    <div class="me-2">
                        <h5 class="card-title mb-4">L'analytique</h5>
                    </div>
                    <div class="ms-auto">
                        <div class="text-sm-end">
                            <div class="btn-group">
                                <button type="button" class="btn btn-info btn-rounded waves-effect waves-light mb-2 dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Exporter <i class="mdi mdi-chevron-down"></i></button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="<?php echo e(route('analyze.export.xlsx.details')); ?>" >Format Excel</a>
                                    <a class="dropdown-item" href="<?php echo e(route('analyze.export.pdf.details')); ?>">Format PDF</a>
                                </div>
                            </div>
                        </div>
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
                                <th class="text-center" scope="row"><?php echo e($loop->iteration); ?></th scope="row">
                                <td style="width: 30%">
                                    <p class="text-muted m-3 text-justify"><?php echo e($item->driver->name); ?></p>
                                </td>
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

                <?php echo e($data->links('vendor.pagination.round')); ?>

            </div>
        </div>
        <!-- end card -->
    </div>
    <!-- end col -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>

    <script src="<?php echo e(URL::asset('assets/js/essential_audio.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\www\ismatech\safetyapp_web\resources\views/analyze/details.blade.php ENDPATH**/ ?>