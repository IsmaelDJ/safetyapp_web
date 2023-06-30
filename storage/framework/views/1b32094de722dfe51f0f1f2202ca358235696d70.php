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

    <?php if(session()->has('success')): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?php echo e(session('success')); ?>

            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <div class="card rounded p-2">
                    <div class="d-flex">
                        <h5 class="card-title align-self-center">Liste des règles</h5>
                        <div class="ms-auto align-self-center">
                            <div class="text-sm-end">
                                <a type="button" href="<?php echo e(route('rules.create')); ?>"
                                   class="btn btn-success btn-rounded waves-effect waves-light"><i
                                        class="mdi mdi-plus me-1"></i> Ajouter
                                </a>
                            </div>
                        </div>
                    </div>    
                </div>
            </div>

            <div class="col-12">
                <div class="row">
                    <?php $__currentLoopData = $rules; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rule): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-md-6">
                            <div class="card rounded">
                                <div class="row">
                                    <div class="col-md-5 ">
                                        <a href="<?php echo e(route('rules.show', $rule)); ?>">
                                            <img src="<?php echo e(URL::asset($rule->image)); ?>" alt=""
                                            style="height: 100%; width: 100%; object-fit: cover; border-top-left-radius: 5px; border-bottom-left-radius: 5px"
                                            class="img-fluid d-block">
                                        </a>
                                    </div>
                                    <div class="col-md-7 p-md-2 pe-md-4 p-4">
                                        <p class="lead fs-6 pb-2" style="text-align: justify"><?php echo e(Str::limit($rule->description)); ?></p>
                                        <div class="mt-2 pb-4">
                                            <div class="essential_audio" data-url="<?php echo e(URL::asset($rule->fr)); ?>"></div>
                                        </div>
                                        <div class="mt-2 pb-4">
                                            <div class="essential_audio" data-url="<?php echo e(URL::asset($rule->ar)); ?>"></div>
                                        </div>
                                        <div class="mt-2 pb-2">
                                            <div class="essential_audio" data-url="<?php echo e(URL::asset($rule->ng)); ?>"></div>
                                        </div>

                                        <div class="d-flex justify-content-end">
                                            <a class="m-1" 
                                                style="border-radius: 50%; background-color: rgba(16, 204, 101, 0.3); width: 2rem; height: 2rem; display: flex; justify-content: center" 
                                                href="<?php echo e(route('rules.edit', $rule)); ?>">
                                                <i class="fa fa-pen" style="align-self: center; color: green"></i> 
                                            </a>
                                            <a class="m-1" 
                                                style="border-radius: 50%; background-color: rgb(231, 107, 85, 0.3); width: 2rem; height: 2rem; display: flex; justify-content: center" 
                                                href="<?php echo e(route('rules.index')); ?>"
                                                onclick="
                                                var result = confirm('Cette règle sera supprimée');
                                                if(result){
                                                    event.preventDefault();
                                                    document.getElementById('delete-form-<?php echo e($rule->id); ?>').submit();
                                                }">
                                                <i class="fa fa-trash" style="align-self: center; color: red"></i> 
                                            </a>
                                            <form method="POST" id="delete-form-<?php echo e($rule->id); ?>"
                                                action="<?php echo e(route('rules.destroy', [$rule])); ?>">
                                              <?php echo csrf_field(); ?>
                                              <input type="hidden" name="_method" value="DELETE">
                                          </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>    

                    <div class="my-2">
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



<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/chad/laravel-workspace/safetyapp_web/resources/views/rules/index.blade.php ENDPATH**/ ?>