

<?php $__env->startSection('title'); ?> Transporteurs <?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
<!-- Bootstrap Css -->
<link href="<?php echo e(URL::asset('/assets/css/bootstrap.min.css')); ?>" id="bootstrap-style" rel="stylesheet" type="text/css" />
<!-- Icons Css -->
<link href="<?php echo e(URL::asset('/assets/css/icons.min.css')); ?>" rel="stylesheet" type="text/css" />
<!-- App Css-->
<link href="<?php echo e(URL::asset('/assets/css/app.min.css')); ?>" id="app-style" rel="stylesheet" type="text/css" />

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<?php if(session()->has('success')): ?>
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <?php echo e(session('success')); ?>

    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php endif; ?>


<div class="col-xl-12">
    <div class="card">
        <div class="card-body">
            <div class="d-flex align-items-start">
                <div class="me-2">
                    <h5 class="card-title mb-4">Liste de transporteurs</h5>
                </div>
                <div class="ms-auto">
                    <div class="text-sm-end">
                        <div class="btn-group">
                            <div class="btn-group">
                                <button type="button" class="btn btn-info btn-rounded waves-effect waves-light mb-2 dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Exporter <i class="mdi mdi-chevron-down"></i></button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="<?php echo e(route('carriers.export.xlsx')); ?>">Format Excel</a>
                                    <a class="dropdown-item" href="<?php echo e(route('carriers.export.pdf')); ?>">Format PDF</a>
                                </div>
                            </div>
                            <a type="button" href="<?php echo e(route('register')); ?>" class="btn btn-success btn-rounded waves-effect waves-light mb-2 me-2"><i class="mdi mdi-plus me-1"></i> Ajouter
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table align-middle ">
                    <thead>
                        <tr>
                            <th class="text-center" scope="col">Image</th>
                            <th class="align-middle">Nom</th>
                            <th class="align-middle">Numéro de téléphone</th>
                            <th class="align-middle">Adresse</th>
                            <th class="align-middle">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $carriers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $carrier): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td class="text-center">
                                <?php if($carrier->user->avatar): ?>
                                <img style="width: 80px; height: 80px" src="<?php echo e(asset($carrier->user->avatar)); ?>" alt="Avatar">
                                <?php else: ?>
                                <img style="width: 80px; height: 80px" src="<?php echo e(asset('images/default-avatar.jpg')); ?>" alt="Default Avatar">
                                <?php endif; ?>
                            </td>
                            <td>
                                <p class="text-muted mb-0 text-justify"><?php echo e($carrier->user->name); ?></p>
                            </td>
                            <td>
                                <p class="text-muted mb-0 text-justify"><?php echo e($carrier->phone); ?></p>
                            </td>
                            <td>
                                <p class="text-muted mb-0 text-justify"><?php echo e($carrier->address); ?></p>
                            </td>

                            <td style="width: 200px">
                                <div class="d-flex gap-3">
                                    <a href="<?php echo e(route('carriers.show', $carrier)); ?>" class="btn btn-default">Détails
                                    </a>
                                    <a href="<?php echo e(route('carriers.edit', $carrier)); ?>" class="btn btn-info">Modifier
                                    </a>

                                    <a href="<?php echo e(route('carriers.index')); ?>" class="btn btn-danger" onclick="
                                                   var result = confirm('Ce contractant et ses employés seront supprimée');
                                                   if(result){
                                                       event.preventDefault();
                                                       document.getElementById('delete-form<?php echo e($carrier->id); ?>').submit();
                                                   }
                                                   ">
                                        Supprimer</a>

                                    <form method="POST" id="delete-form<?php echo e($carrier->id); ?>" action="<?php echo e(route('carriers.destroy', [$carrier])); ?>">
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

            <?php echo e($carriers->links('vendor.pagination.round')); ?>

        </div>
    </div>
    <!-- end card -->
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\www\ismatech\safetyapp_web\resources\views/carriers/index.blade.php ENDPATH**/ ?>