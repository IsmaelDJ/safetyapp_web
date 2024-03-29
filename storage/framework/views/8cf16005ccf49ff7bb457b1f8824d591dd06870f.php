<?php $__env->startSection('title'); ?> Catégories <?php $__env->stopSection(); ?>

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

    <?php if(session()->has('success')): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?php echo e(session('success')); ?>

            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <?php if(isset($categories)): ?>


        <!-- end row -->


        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-start">
                        <div>
                            <h5 class="card-title mt-2">Liste de catégories</h5>
                        </div>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('doAdvanced')): ?>
                        <div class="ms-auto">
                            <div class="text-sm-end">
                                <a type="button" href="<?php echo e(route('categories.create')); ?>"
                                   class="btn btn-success btn-rounded waves-effect waves-light"><i
                                        class="mdi mdi-plus me-1"></i> Ajouter
                                </a>
                            </div>
                        </div>
                        <?php endif; ?>
                    </div>

                    <div class="grid-container">
                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div style="position: relative; border: 1px solid #ccc; border-radius: 8px">
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('doAdvanced')): ?>
                                <div class="d-flex flex-column" style="position: absolute; max-width: 2rem; right: 5px; top: 5px; z-index:1">
                                    <a class="m-1" 
                                        style="border-radius: 50%; background-color: #edf8ef; width: 1.5rem; height: 1.5rem; display: flex; justify-content: center" 
                                        href="<?php echo e(route('categories.edit', $category)); ?>">
                                        <i class="fa fa-pen" style="align-self: center; color: #34a543"></i> 
                                    </a>
                                    <a class="m-1" 
                                        style="border-radius: 50%; background-color: #ffe8e8; width: 1.5rem; height: 1.5rem; display: flex; justify-content: center" 
                                        href="<?php echo e(route('root')); ?>"
                                        onclick="
                                        var result = confirm('Cette catégorie sera supprimée');
                                        if(result){
                                            event.preventDefault();
                                            document.getElementById('delete-form-<?php echo e($category->id); ?>').submit();
                                        }">
                                        <i class="fa fa-trash" style="align-self: center; color: #e80000"></i> 
                                    </a>
                                    <form method="POST" id="delete-form-<?php echo e($category->id); ?>"
                                        action="<?php echo e(route('categories.destroy', [$category])); ?>">
                                      <?php echo csrf_field(); ?>
                                      <input type="hidden" name="_method" value="DELETE">
                                  </form>
                                </div>
                                <?php endif; ?>
                                <div style="z-index: -1">
                                    <a href="<?php echo e(route('categories.show', $category)); ?>" class="d-block d-flex flex-column text-center p-2">
                                        <img src="<?php echo e(isset($category->image) ? asset($category->image) : asset('images/users/avatar-1.jpg')); ?>" alt="" style="object-fit: cover" class="m-4 align-self-center avatar-md rounded-circle img-thumbnail">
                                        <span class="text-black"><?php echo e($category->name); ?></span>
                                    </a>
                                </div>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>

                    <?php echo e($categories->links('vendor.pagination.round')); ?>

                </div>
            </div>
            <!-- end card -->
        </div>

    <?php endif; ?>

<?php $__env->stopSection(); ?>





<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/chad/laravel-workspace/safetyapp_web/resources/views/categories/index.blade.php ENDPATH**/ ?>