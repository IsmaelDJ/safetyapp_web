

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
                        <h5 class="card-title mb-4">Liste des règles</h5>
                    </div>
                    <div class="ms-auto">
                        <div class="text-sm-end">
                            <a type="button" href="<?php echo e(route('rules.create')); ?>"
                               class="btn btn-success btn-rounded waves-effect waves-light mb-2 me-2"><i
                                    class="mdi mdi-plus me-1"></i> Ajouter
                            </a>
                        </div>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table align-middle ">
                        <thead>
                        <tr>
                            <th scope="col">Utilisateur</th>
                            <th scope="col">Action</th>
                            <th scope="col">Date</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td >
                                    <?php echo e($item->employee->name); ?>

                                </td>
                                <td >
                                    <?php echo e(str::limit( $item->action->description, $limit = 2, $end = '...')); ?>

                                </td>
                                <td>
                                    <?php echo e($item->created_at); ?>

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

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Ismae\Downloads\safetyapp_web\resources\views/analyze/details.blade.php ENDPATH**/ ?>