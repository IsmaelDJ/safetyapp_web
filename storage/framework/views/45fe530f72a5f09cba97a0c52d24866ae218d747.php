<?php $__env->startSection('title'); ?> Particuliers <?php $__env->stopSection(); ?>

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
                        <h5 class="card-title mb-4">Liste des particuliers</h5>
                    </div>
                    <div class="ms-auto">
                        <div class="text-sm-end">
                            <a type="button" href="<?php echo e(route('particulars.create')); ?>"
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
                            <th class="text-center" scope="col">Avatar</th>
                            <th scope="col">Nom</th>
                            <th scope="col">Numéro de téléphone</th>
                            <th scope="col">Identifiant</th>
                            <th scope="col">Mot de passe</th>
                            <th class="text-center" scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $particulars; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $particular): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view', $particular)): ?>
                            <tr>
                                <td class="text-center">
                                    <img class="rounded-circle" src="<?php echo e(asset($particular->avatar)); ?>" alt="avatar" height="35" width="35">
                                </td>
                                <td>
                                    <p class="text-muted mb-0 text-justify"><?php echo e($particular->name); ?></p>
                                </td>
                                <td>
                                    <p class="text-muted mb-0 text-justify"><?php echo e($particular->phone); ?></p>
                                </td>
                                <td>
                                    <p class="text-muted mb-0 text-justify"><?php echo e($particular->uuid); ?></p>
                                </td>
                                <td>
                                    <p class="text-muted mb-0 text-justify"><?php echo e($particular->password); ?></p>
                                </td>

                                <td style="width: 200px">
                                    <div class="d-flex gap-3">

                                        <a href="<?php echo e(route('particulars.show', $particular)); ?>"
                                           class="btn btn-default">Détails
                                        </a>
                                        <a href="<?php echo e(route('particulars.edit', $particular)); ?>"
                                           class="btn btn-info">Modifier
                                        </a>

                                        <a href="<?php echo e(route('particulars.index')); ?>" class="btn btn-danger"
                                           onclick="
                                                   var result = confirm('Cet utilisateur sera supprimée');
                                                   if(result){
                                                       event.preventDefault();
                                                       document.getElementById('delete-form<?php echo e($particular->id); ?>').submit();
                                                   }
                                                   ">
                                            Supprimer</a>

                                        <form method="POST" id="delete-form<?php echo e($particular->id); ?>"
                                              action="<?php echo e(route('particulars.destroy', [$particular])); ?>">
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

                <?php echo e($particulars->links('vendor.pagination.round')); ?>

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



<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/chad/laravel-workspace/safetyapp_web/resources/views/particulars/index.blade.php ENDPATH**/ ?>