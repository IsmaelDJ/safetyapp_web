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
                        <span class="tex text-muted pb-1">Entreprise</span>
                        <h4 class="lead mb-4"><?php echo e($contractor->name); ?></h4>
                        <i class="mdi mdi-phone me-1 "></i><span class="text-muted">Tel</span>
                        <h4 class="lead mb-4"><?php echo e($contractor->phone); ?></h4>
                        <i class="mdi mdi-map-marker me-1 "></i><span class="text-muted">Adresse</span>
                        <h4 class="lead mb-4"><?php echo e($contractor->address); ?></h4>
                        <?php if(isset($contractor->nif)): ?>
                            <i class="mdi mdi-numeric me-1"></i><span class="text-muted">NIF</span>
                            <h4 class="lead mb-4"><?php echo e($contractor->nif); ?></h4>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="col-xl-9">
                <div class="card">
                    <div class="card">

                        <div class="card-body" style="height: 80vh">
                            <div class="d-flex align-items-start">
                                <div class="me-2">
                                    <h5 class="card-title mb-4">Utilisateurs de cette entreprise</h5>
                                </div>
                                <div class="ms-auto">
                                    <div class="text-sm-end">
                                        <a type="button" href="<?php echo e(route('contractor_employees', $contractor)); ?>"
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
                                    <?php $__currentLoopData = $contractorEmployees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $contractorEmployee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td style="width: 250px">
                                                <p class="text-muted mb-0 text-justify"><?php echo e($contractorEmployee->name); ?></p>
                                            </td>
                                            <td style="width: 250px">
                                                <p class="text-muted mb-0 text-justify"><?php echo e($contractorEmployee->phone); ?></p>
                                            </td>
                                            <td style="width: 200px">
                                                <div class="d-flex gap-3">

                                                    <a href="<?php echo e(route('employees.show', $contractorEmployee)); ?>"
                                                       class="btn btn-default">Détails
                                                    </a>
                                                    <a href="<?php echo e(route('employees.edit', $contractorEmployee)); ?>"
                                                       class="btn btn-info">Modifier
                                                    </a>

                                                    <a href="<?php echo e(route('employees.index')); ?>" class="btn btn-danger"
                                                       onclick="
                                                   var result = confirm('Cet utilisateur sera supprimée');
                                                   if(result){
                                                       event.preventDefault();
                                                       document.getElementById('delete-form').submit();
                                                   }
                                                   ">
                                                        Supprimer</a>

                                                    <form method="POST" id="delete-form"
                                                          action="<?php echo e(route('employees.destroy', [$contractorEmployee])); ?>">
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

                            <?php echo e($contractorEmployees->links('vendor.pagination.round')); ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>





<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\safetyapp\resources\views/contractors/show.blade.php ENDPATH**/ ?>