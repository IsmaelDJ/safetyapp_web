<?php $__env->startSection('title'); ?> Catégories <?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
    <!-- Bootstrap Css -->
    <link href="<?php echo e(URL::asset('/assets/css/bootstrap.min.css')); ?>" id="bootstrap-style" rel="stylesheet"
          type="text/css"/>
    <!-- Icons Css -->
    <link href="<?php echo e(URL::asset('/assets/css/icons.min.css')); ?>" rel="stylesheet" type="text/css"/>
    <!-- App Css-->
    <link href="<?php echo e(URL::asset('/assets/css/app.min.css')); ?>" id="app-style" rel="stylesheet" type="text/css"/>
    <link href="<?php echo e(URL::asset('/assets/css/essential_audio.css')); ?>" id="essential_audio" rel="stylesheet"
          type="text/css"/>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>


    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-4">
                <div class="card">
                    <div class="card-body" style="height: 100vh;">
                        <img src="<?php echo e(URL::asset($category->image)); ?>" alt="" class="img-fluid rounded mb-4">
                        <h5 class="card-title"><?php echo e($category->name); ?></h5>
                    </div>
                </div>
            </div>
            <div class="col-8">

                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-start">
                            <div class="me-2">
                                <h5 class="card-title mb-4">Règles dans la même catégorie</h5>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="table align-middle ">
                                <thead>
                                <tr>
                                    <th scope="col">Illustration</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Audio Français</th>


                                    <th scope="col">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $__currentLoopData = $rules; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categoryRule): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td style="width: 150px;"><img src="<?php echo e(URL::asset($categoryRule->image)); ?>" alt=""
                                                                       class="avatar-md h-auto d-block rounded"></td>
                                        <td style="width: 250px">
                                            <p class="text-muted mb-0 text-justify"><?php echo e($categoryRule->description); ?></p>
                                        </td>
                                        <td >
                                            <div class="essential_audio" data-url="<?php echo e(URL::asset($categoryRule->fr)); ?>"></div>
                                        </td>






                                        <td style="width: 200px">
                                            <div class="d-flex gap-3">

                                                <a href="<?php echo e(route('rules.show', $categoryRule)); ?>"
                                                   class="btn btn-default">Détails
                                                </a>
                                                <a href="<?php echo e(route('rules.edit', $categoryRule)); ?>"
                                                   class="btn btn-info">Modifier
                                                </a>

                                                <a href="<?php echo e(route('rules.index')); ?>" class="btn btn-danger"
                                                   onclick="
                                                   var result = confirm('Cette règle sera supprimée');
                                                   if(result){
                                                       event.preventDefault();
                                                       document.getElementById('delete-form').submit();
                                                   }
                                                   ">
                                                    Supprimer</a>

                                                <form method="POST" id="delete-form"
                                                      action="<?php echo e(route('rules.destroy', [$categoryRule])); ?>">
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

                        <?php echo e($rules->links('vendor.pagination.round')); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>

    <script src="<?php echo e(URL::asset('assets/js/essential_audio.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/safetyapp/resources/views/categories/show.blade.php ENDPATH**/ ?>