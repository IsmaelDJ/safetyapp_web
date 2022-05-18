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
                        <h5 class="card-title mb-4"><?php echo e($contractor->name); ?></h5>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table align-middle ">
                        <thead>
                        <tr>
                            <th scope="col">Nom</th>
                            <th scope="col">Numéro de téléphone</th>
                            <th scope="col">Identifiant</th>
                            <th scope="col">Mot de passe</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td style="width: 250px">
                                    <p class="text-muted mb-0 text-justify"><?php echo e($employee->name); ?></p>
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



<?php echo $__env->make('layouts.master-without-nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\safetyapp\resources\views/contractors/export_employees.blade.php ENDPATH**/ ?>