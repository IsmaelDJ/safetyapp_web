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
                        <h5 class="card-title mb-4">Liste des utilisateurs</h5>
                    </div>
                    <div class="ms-auto">
                        <div class="text-sm-end">
                            <a type="button" href="<?php echo e(route('employees.create')); ?>"
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
                            <th scope="col">Nom</th>
                            <th scope="col">Entreprise</th>
                            <th scope="col">Numéro de téléphone</th>
                            <th scope="col">Identifiant</th>
                            <th scope="col">Mot de passe</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td style="width: 250px">
                                    <p class="text-muted mb-0 text-justify"><?php echo e($employee->name); ?></p>
                                </td>
                                <td>
                                    <div>
                                        <a href="<?php echo e(route('contractors.show', $employee->contractor)); ?>"
                                           class=" mb-2 me-2">

                                            <?php echo e($employee->contractor->name); ?>

                                        </a>
                                    </div>
                                </td>
                                <td style="width: 250px">
                                    <p class="text-muted mb-0 text-justify"><?php echo e($employee->phone); ?></p>
                                </td>
                                <td style="width: 250px">
                                    <p class="text-muted mb-0 text-justify"><?php echo e($employee->uid); ?></p>
                                </td>
                                <td style="width: 250px">
                                    <p class="text-muted mb-0 text-justify"><?php echo e($employee->password); ?></p>
                                </td>

                                <td style="width: 200px">
                                    <div class="d-flex gap-3">

                                        <a href="<?php echo e(route('employees.show', $employee)); ?>"
                                           class="btn btn-default">Détails
                                        </a>
                                        <a href="<?php echo e(route('employees.edit', $employee)); ?>"
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
                                              action="<?php echo e(route('employees.destroy', [$employee])); ?>">
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

                <?php echo e($employees->links('vendor.pagination.round')); ?>

            </div>
        </div>
        <!-- end card -->
    </div>
    <!-- end col -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>

    <script src="<?php echo e(URL::asset('assets/js/essential_audio.js')); ?>"></script>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\safetyapp\resources\views/employees/index.blade.php ENDPATH**/ ?>