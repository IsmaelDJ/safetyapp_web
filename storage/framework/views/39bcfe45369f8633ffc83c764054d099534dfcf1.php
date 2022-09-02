

<?php $__env->startSection('title'); ?> <?php echo app('translator')->get('translation.Starter_Page'); ?> <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <?php $__env->startComponent('components.breadcrumb'); ?>
        <?php $__env->slot('li_1'); ?> Utility <?php $__env->endSlot(); ?>
        <?php $__env->slot('title'); ?> Starter Page <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="d-flex">
                                <div class="flex-shrink-0 me-3">
                                    <img src="<?php echo e(isset(Auth::user()->avatar) ? asset(Auth::user()->avatar) : asset('/assets/images/users/avatar-1.jpg')); ?>" alt="" class="avatar-md rounded-circle img-thumbnail">
                                </div>
                                <div class="flex-grow-1 align-self-center">
                                    <div class="text-muted">
                                        <p class="mb-2">Bienvenu sur Safety Analytique</p>
                                        <h5 class="mb-1"><?php echo e(Auth::user()->name ? Auth::user()->name : "Nom et Prénom"); ?></h5>
                                        <p class="mb-0"><?php echo e(Auth::user()->email ? Auth::user()->email : "Adresse email"); ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-lg-4 align-self-center">
                            <div class="text-lg-center mt-4 mt-lg-0">
                                <div class="row">
                                    <div class="col-4">
                                        <div>
                                            <p class="text-muted text-truncate mb-2">Règles</p>
                                            <h5 class="mb-0"><?php echo e($total_rules); ?></h5>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div>
                                            <p class="text-muted text-truncate mb-2">Quiz</p>
                                            <h5 class="mb-0"><?php echo e($total_quizzes); ?></h5>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div>
                                            <p class="text-muted text-truncate mb-2">Employés</p>
                                            <h5 class="mb-0"><?php echo e($total_employees); ?></h5>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-lg-4 d-none d-lg-block">
                            <div class="clearfix mt-4 mt-lg-0">
                                <div class="dropdown float-end">
                                    <button class="btn btn-primary" type="button">
                                        <i class="fa fa-edit"></i> Editer
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Ismae\Downloads\safetyapp_web\resources\views/index.blade.php ENDPATH**/ ?>