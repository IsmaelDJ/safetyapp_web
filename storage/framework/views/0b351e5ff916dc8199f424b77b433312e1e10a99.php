

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
                        <h5 class="card-title mb-4">Liste des chauffeurs</h5>
                    </div>
                    <div class="ms-auto">
                        <div class="text-sm-end">
                            <div class="btn-group   !spacing" role="group">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-info btn-rounded waves-effect waves-light mb-2 dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Exporter <i class="mdi mdi-chevron-down"></i></button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="<?php echo e(route('drivers.export.xlsx')); ?>" >Format Excel</a>
                                        <a class="dropdown-item" href="<?php echo e(route('drivers.export.pdf')); ?>">Format PDF</a>
                                    </div>
                                </div>
                                
                                <a type="button" href="<?php echo e(route('drivers.create')); ?>"
                                    class="btn btn-success btn-rounded waves-effect waves-light mb-2 me-2"><i
                                    class="mdi mdi-plus me-1"></i> Ajouter
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table align-middle ">
                        <thead>
                        <tr>
                            <th class="text-center" scope="col">Avatar</th>
                            <th scope="col">Nom</th>
                            <th scope="col">Transporteur</th>
                            <th scope="col">Numéro de téléphone</th>
                            <th scope="col">Clé OBC</th>
                            <th scope="col">Mot de passe</th>
                            <th class="text-center" scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $drivers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $driver): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view', $driver)): ?>
                            <tr>
                                <td class="text-center">
                                    <img class="rounded-circle" src="<?php echo e(asset($driver->avatar)); ?>" alt="avatar" height="35" width="35">
                                </td>
                                <td>
                                    <p class="text-muted mb-0 text-justify"><?php echo e($driver->name); ?></p>
                                </td>
                                <td>
                                    <div>
                                        <a href="<?php echo e(route('carriers.show', $driver->user)); ?>"
                                           class=" mb-2 me-2">

                                            <?php echo e($driver->user->name); ?>

                                        </a>
                                    </div>
                                </td>
                                <td>
                                    <p class="text-muted mb-0 text-justify"><?php echo e($driver->phone); ?></p>
                                </td>
                                <td>
                                    <p class="text-muted mb-0 text-justify"><?php echo e($driver->obc); ?></p>
                                </td>
                                <td>
                                    <p class="text-muted mb-0 text-justify"><?php echo e($driver->password); ?></p>
                                </td>

                                <td style="width: 200px">
                                    <div class="d-flex gap-3">

                                        <a href="<?php echo e(route('drivers.show', $driver)); ?>"
                                           class="btn btn-default">Détails
                                        </a>
                                        <a href="<?php echo e(route('drivers.edit', $driver)); ?>"
                                           class="btn btn-info">Modifier
                                        </a>

                                        <a href="<?php echo e(route('drivers.index')); ?>" class="btn btn-danger"
                                           onclick="
                                                   var result = confirm('Cet utilisateur sera supprimée');
                                                   if(result){
                                                       event.preventDefault();
                                                       document.getElementById('delete-form').submit();
                                                   }
                                                   ">
                                            Supprimer</a>

                                        <form method="POST" id="delete-form"
                                              action="<?php echo e(route('drivers.destroy', [$driver])); ?>">
                                            <?php echo csrf_field(); ?>
                                            <input type="hidden" name="_method" value="DELETE">
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </tbody>
                    </table>


                </div>

                <?php echo e($drivers->links('vendor.pagination.round')); ?>

            </div>
        </div>
        <!-- end card -->
    </div>
    <!-- end col -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script>
        $('')
    </script>
    <script src="<?php echo e(URL::asset('assets/js/essential_audio.js')); ?>"></script>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\safetyapp_web\resources\views/drivers/index.blade.php ENDPATH**/ ?>