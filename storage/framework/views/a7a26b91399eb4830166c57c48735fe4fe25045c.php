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

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row mb-2">
                            <div class="col-sm-4">
                                <div class="search-box me-2 mb-2 d-inline-block">
                                    <div class="position-relative">
                                        <h4>Liste de catégories</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <div class="text-sm-end">
                                    <a type="button" href="<?php echo e(route('categories.create')); ?>"
                                       class="btn btn-success btn-rounded waves-effect waves-light mb-2 me-2"><i
                                            class="mdi mdi-plus me-1"></i> Ajouter
                                    </a>
                                </div>
                            </div><!-- end col-->
                        </div>

                        <div class="table-responsive">
                            <table class="table align-middle table-nowrap table-check">
                                <thead class="table-light">
                                <tr>
                                    <th style="width: 20px;" class="align-middle">
                                        <div class="form-check font-size-16">
                                            <input class="form-check-input" type="checkbox" id="checkAll">
                                            <label class="form-check-label" for="checkAll"></label>
                                        </div>
                                    </th>
                                    <th class="align-middle">N°</th>
                                    <th class="align-middle">Image</th>
                                    <th class="align-middle">Description</th>
                                    <th class="align-middle">Voir les details</th>
                                    <th class="align-middle">Action</th>
                                </tr>
                                </thead>
                                <tbody>

                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td>
                                            <div class="form-check font-size-16">
                                                <input class="form-check-input" type="checkbox" id="orderidcheck01">
                                                <label class="form-check-label" for="orderidcheck01"></label>
                                            </div>
                                        </td>
                                        <td><a href="javascript: void(0);"
                                               class="text-body fw-bold"><?php echo e($category->id); ?></a></td>
                                        <td>
                                            <img src="<?php echo e(URL::asset($category->image)); ?>" alt="" class="avatar-lg">
                                        </td>
                                        <td>
                                            <?php echo e($category->name); ?>

                                        </td>

                                        <td>
                                            <!-- Button trigger modal -->
                                            <a class="btn btn-primary btn-sm btn-rounded" role="button"
                                               href="<?php echo e(route('categories.show', $category)); ?>">
                                                Voir les details
                                            </a>
                                        </td>
                                        <td>
                                            <div class="d-flex gap-3">
                                                <a href="<?php echo e(route('categories.edit', $category)); ?>"
                                                   class="text-success"><i
                                                        class="mdi mdi-pencil font-size-18"></i></a>

                                                <a href="<?php echo e(route('categories.index')); ?>" class="text-danger"
                                                   onclick="
                                                   var result = confirm('Cette catégorie sera supprimée');
                                                   if(result){
                                                       event.preventDefault();
                                                       document.getElementById('delete-form').submit();
                                                   }
                                                   ">
                                                    <i class="mdi mdi-delete font-size-18"></i></a>

                                                <form method="POST" id="delete-form"
                                                      action="<?php echo e(route('categories.destroy', [$category])); ?>">
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

                        <?php echo e($categories->links('vendor.pagination.round')); ?>


                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->



    <?php endif; ?>

<?php $__env->stopSection(); ?>





<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\safetyapp\resources\views/categories/index.blade.php ENDPATH**/ ?>