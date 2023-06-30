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
            <div class="col-xl-12">
                <div class="card rounded">
                    <div class="m-2 d-flex" style="position: relative">
                        <img src="<?php echo e(URL::asset($category->image)); ?>" alt="" class="img-fluid rounded-circle align-self-center" style="height: 2.5rem; width: 2.5rem;">
                        <h2 class="align-self-center ms-4 mt-2 fw-bold"><?php echo e($category->name); ?></h2>
                        <div class="d-flex" style="position: absolute; max-width: 6rem; right: 0px; top: 5px; z-index:1">
                            <a class="m-1" 
                                style="border-radius: 50%; background-color: rgba(16, 204, 101, 0.3); width: 2rem; height: 2rem; display: flex; justify-content: center" 
                                href="<?php echo e(route('categories.edit', $category)); ?>">
                                <i class="fa fa-pen" style="align-self: center; color: green"></i> 
                            </a>
                            <a class="m-1" 
                                style="border-radius: 50%; background-color: rgb(231, 107, 85, 0.3); width: 2rem; height: 2rem; display: flex; justify-content: center" 
                                href="<?php echo e(route('categories.index')); ?>"
                                onclick="
                                var result = confirm('Cette catégorie sera supprimée');
                                if(result){
                                    event.preventDefault();
                                    document.getElementById('delete-form-<?php echo e($category->id); ?>').submit();
                                }">
                                <i class="fa fa-trash" style="align-self: center; color: red"></i> 
                            </a>
                            <form method="POST" id="delete-form-<?php echo e($category->id); ?>"
                                action="<?php echo e(route('categories.destroy', [$category])); ?>">
                              <?php echo csrf_field(); ?>
                              <input type="hidden" name="_method" value="DELETE">
                          </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12">
                <div class="row">
                    <?php $__currentLoopData = $rules; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rule): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="rule-item" style="width: 20%">
                        <div class="card mb-2 rounded" style="background-image:linear-gradient(0deg, rgba(255, 255, 255, 0.3), rgba(0, 0, 0, 0.3)), url(<?php echo e(URL::asset($rule->image)); ?>); background-size: 100%; background-repeat: no-repeat; background-position: center;">
                            <div class="d-flex justify-content-end flex-column" style="height: 270px">
                                <a href="<?php echo e(route("rules.show", $rule->id)); ?>" style="height: 100%; width: 100%;"></a>
                                <div class="d-flex justify-content-between">
                                    <div class="d-xl-flex justify-content-between align-self-center">
                                        <div class="essential_audio m-3" data-url="<?php echo e(URL::asset($rule->fr)); ?>"></div>
                                        <div class="essential_audio m-3" data-url="<?php echo e(URL::asset($rule->ar)); ?>"></div>
                                        <div class="essential_audio m-3" data-url="<?php echo e(URL::asset($rule->ng)); ?>"></div>
                                    </div>
    
                                    <div class="d-flex align-self-md-center align-self-end mb-2">
                                        <a class="me-1" 
                                            style="border-radius: 50%; background-color: rgba(16, 204, 101, 0.3); width: 1.5rem; height: 1.5rem; display: flex; justify-content: center" 
                                            href="<?php echo e(route('rules.edit', $rule)); ?>">
                                            <i class="fa fa-pen" style="align-self: center; color: green"></i> 
                                        </a>
                                        <a class="me-1" 
                                            style="border-radius: 50%; background-color: rgb(231, 107, 85, 0.3); width: 1.5rem; height: 1.5rem; display: flex; justify-content: center" 
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
                        <p class="lead fs-6" style="text-align: justify"><?php echo e(Str::limit($rule->description, 22)); ?></p>
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

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/chad/laravel-workspace/safetyapp_web/resources/views/categories/show.blade.php ENDPATH**/ ?>