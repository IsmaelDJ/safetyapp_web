<?php $__env->startSection('title'); ?> Règles <?php $__env->stopSection(); ?>

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
    <div class="container-fluid p-4 pb-0 pt-0">
        <div class="row gap-3" >
            <div class="card card-body">
                <div class="row">
                    <div class="col-xl-3 ">
                        <img src="<?php echo e(URL::asset($rule->image)); ?>" alt=""
                             class="img-fluid d-block rounded"></td>
                    </div>
                    <div class="col-xl-8 m-auto">
                        <div>
                            <h5 class=" mt-4">Catégorie</h5>
                            <a type="button" href="<?php echo e(route('categories.show', $rule->category)); ?>"
                               class="btn btn-success btn-rounded waves-effect waves-light mb-4 me-2"><i
                                    class="mdi mdi-tag me-1"></i> <?php echo e($rule->category->name); ?>

                            </a>
                        </div>
                        <div class="mb-4">
                            <h5 class=" mt-4">Description</h5>
                            <p class="lead mb-0 text-justify"><?php echo e($rule->description); ?></p>
                        </div>
                        <div class="mt-4 pb-4 pt-4">
                            <h5 class=" mt-4">Audio Français</h5>
                            <div class="essential_audio mt-4" data-url="<?php echo e(URL::asset($rule->fr)); ?>"></div>
                        </div>
                        <div class="mt-4 pb-4">
                            <h5 class=" mt-4">Audio Arabe</h5>
                            <div class="essential_audio mt-4" data-url="<?php echo e(URL::asset($rule->ar)); ?>"></div>
                        </div>
                        <div class="mt-4 pb-4">
                            <h5 class=" mt-4">Audio Ngambaye</h5>
                            <div class="essential_audio mt-4" data-url="<?php echo e(URL::asset($rule->ng)); ?>"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="container-fluid">
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
                        <tr >
                            <th scope="col">Illustration</th>
                            <th scope="col">Description</th>
                            <th scope="col">Audio Français</th>
                            <th scope="col">Audio Arabe</th>
                            <th scope="col">Audio Ngambaye</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $sameCategoryRules; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categoryRule): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td style="width: 150px;"><img src="<?php echo e(URL::asset($categoryRule->image)); ?>" alt=""
                                                               class="avatar-md h-auto d-block rounded"></td>
                                <td style="width: 250px">
                                    <p class="text-muted mb-0 text-justify"><?php echo e($categoryRule->description); ?></p>
                                </td>
                                <td >
                                    <div class="essential_audio" data-url="<?php echo e(URL::asset($categoryRule->fr)); ?>"></div>
                                </td>
                                <td>
                                    <div class="essential_audio" data-url="<?php echo e(URL::asset($categoryRule->ar)); ?>" ></div>
                                </td>
                                <td>
                                    <div class="essential_audio" data-url="<?php echo e(URL::asset($categoryRule->ng)); ?>" ></div>
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
                                                       document.getElementById('delete-form<?php echo e($categoryRule->id); ?>').submit();
                                                   }
                                                   ">
                                            Supprimer</a>

                                        <form method="POST" id="delete-form<?php echo e($categoryRule->id); ?>"
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

                <?php echo e($sameCategoryRules->links('vendor.pagination.round')); ?>

            </div>
        </div>
    </div>



<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>

    <script src="<?php echo e(URL::asset('assets/js/essential_audio.js')); ?>"></script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/chad/laravel-workspace/safetyapp_web/resources/views/rules/show.blade.php ENDPATH**/ ?>