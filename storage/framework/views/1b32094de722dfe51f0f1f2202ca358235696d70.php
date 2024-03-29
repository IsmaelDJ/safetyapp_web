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
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('doAdvanced')): ?>
                        <div class="ms-auto align-self-center">
                            <div class="text-sm-end">
                                <a type="button" href="<?php echo e(route('rules.create')); ?>"
                                   class="btn btn-success btn-rounded waves-effect waves-light"><i
                                        class="mdi mdi-plus me-1"></i> Ajouter
                                </a>
                            </div>
                        </div>
                        <?php endif; ?>
                    </div>    
                </div>
            </div>

            <div class="col-12">
                <div class="row">
                    <?php $__currentLoopData = $rules; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rule): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="rule-item" style="width: 20%">
                        <div class="card mb-2 rounded" style="background-image:linear-gradient(0deg, rgba(0, 0, 0, 0.3), rgba(255, 255, 255, 0)), url(<?php echo e(URL::asset($rule->image)); ?>); background-size: 100%; background-repeat: no-repeat; background-position: center;">
                            <div class="d-flex justify-content-end flex-column" style="height: 280px">
                                <a href="<?php echo e(route("rules.show", $rule->id)); ?>" style="height: 100%; width: 100%;"></a>
                                <div class="d-flex justify-content-between">
                                    <div class="d-xl-flex justify-content-between align-self-center">
                                        <div class="essential_audio m-3" data-url="<?php echo e(URL::asset($rule->fr)); ?>"></div>
                                        <div class="essential_audio m-3" data-url="<?php echo e(URL::asset($rule->ar)); ?>"></div>
                                        <div class="essential_audio m-3" data-url="<?php echo e(URL::asset($rule->ng)); ?>"></div>
                                    </div>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('doAvanced')): ?>
                                    <div class="d-flex align-self-md-center align-self-end mb-2">
                                        <a class="me-1 rounded-circle d-flex justify-content-center" 
                                            style="background-color: #edf8ef; width: 1.5rem; height: 1.5rem;" 
                                            href="<?php echo e(route('rules.edit', $rule)); ?>">
                                            <i class="fa fa-pen" style="align-self: center; color: #34a543"></i> 
                                        </a>
                                        <a class="me-1 rounded-circle d-flex justify-content-center" 
                                            style="background-color: #ffe8e8; width: 1.5rem; height: 1.5rem;" 
                                            href="<?php echo e(route('rules.index')); ?>"
                                            onclick="
                                            var result = confirm('Cette règle sera supprimée');
                                            if(result){
                                                event.preventDefault();
                                                document.getElementById('delete-form-<?php echo e($rule->id); ?>').submit();
                                            }">
                                            <i class="fa fa-trash" style="align-self: center; color: #e80000"></i> 
                                        </a>
                                        <form method="POST" id="delete-form-<?php echo e($rule->id); ?>"
                                            action="<?php echo e(route('rules.destroy', [$rule])); ?>">
                                          <?php echo csrf_field(); ?>
                                          <input type="hidden" name="_method" value="DELETE">
                                      </form>
                                    </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <p class="lead" style="font-size: 11px; text-align: justify"><?php echo e(Str::limit($rule->description, 25)); ?></p>
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