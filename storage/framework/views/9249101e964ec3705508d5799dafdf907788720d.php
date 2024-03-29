

<?php $__env->startSection('title'); ?> Sous-traitants <?php $__env->stopSection(); ?>

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
                <div class="card" style="height: 80vh">
                    <div class="card-body">
                        <div class="mb-4">
                            <img src="<?php echo e(URL::asset($carrier->user->avatar)); ?>" alt="" class="img-fluid rounded mb-2" width="300" height="100">
                            <h5 class="card-title"><?php echo e($carrier->user->name); ?></h5>
                        </div>
                        <i class="mdi mdi-map-marker me-1 "></i><span class="text-muted">E-mail</span>
                        <h4 class="lead mb-4"><?php echo e($carrier->user->email); ?></h4>
                        <i class="mdi mdi-phone me-1 "></i><span class="text-muted">Tel</span>
                        <h4 class="lead mb-4"><?php echo e($carrier->phone); ?></h4>
                        <i class="mdi mdi-map-marker me-1 "></i><span class="text-muted">Adresse</span>
                        <h4 class="lead mb-4"><?php echo e($carrier->address); ?></h4>
                    </div>
                </div>
            </div>
            <div class="col-xl-9">
                <div class="card">
                    <div class="card">

                        <div class="card-body" style="height: 80vh">
                            <div class="d-flex align-items-start">
                                <div class="me-2">
                                    <h5 class="card-title mb-4">Chauffeurs de ce transporteur</h5>
                                </div>
                                <div class="ms-auto">
                                    <div class="text-sm-end">
                                        <a type="button" href="<?php echo e(route('carrier_drivers', $carrier)); ?>"
                                           class="btn btn-success btn-rounded waves-effect waves-light mb-2 me-2">Exporter
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="table-responsive">
                                <table class="table align-middle ">
                                    <thead>
                                    <tr>
                                        <th scope="col">Nom</th>
                                        <th scope="col">Numéro de téléphone</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $__currentLoopData = $carrierDrivers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $carrierDriver): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td style="width: 250px">
                                                <p class="text-muted mb-0 text-justify"><?php echo e($carrierDriver->name); ?></p>
                                            </td>
                                            <td style="width: 250px">
                                                <p class="text-muted mb-0 text-justify"><?php echo e($carrierDriver->phone); ?></p>
                                            </td>
                                            <td style="width: 200px">
                                                <div class="d-flex gap-3">

                                                    <a href="<?php echo e(route('drivers.show', $carrierDriver)); ?>"
                                                       class="btn btn-default">Détails
                                                    </a>
                                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('doAdvanced')): ?>
                                                    <a href="<?php echo e(route('drivers.edit', $carrierDriver)); ?>"
                                                       class="btn btn-info">Modifier
                                                    </a>

                                                    <a href="<?php echo e(route('drivers.index')); ?>" class="btn btn-danger"
                                                       onclick="
                                                   var result = confirm('Cet utilisateur sera supprimée');
                                                   if(result){
                                                       event.preventDefault();
                                                       document.getElementById('delete-form<?php echo e($carrierDriver->id); ?>').submit();
                                                   }
                                                   ">
                                                        Supprimer</a>

                                                    <form method="POST" id="delete-form<?php echo e($carrierDriver->id); ?>"
                                                          action="<?php echo e(route('drivers.destroy', [$carrierDriver])); ?>">
                                                        <?php echo csrf_field(); ?>
                                                        <input type="hidden" name="_method" value="DELETE">
                                                    </form>
                                                    <?php endif; ?>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    </tbody>
                                </table>


                            </div>

                            <?php echo e($carrierDrivers->links('vendor.pagination.round')); ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>





<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\www\ismatech\safetyapp_web\resources\views/carriers/show.blade.php ENDPATH**/ ?>