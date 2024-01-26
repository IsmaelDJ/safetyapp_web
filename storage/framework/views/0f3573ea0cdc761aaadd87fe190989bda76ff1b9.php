<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

<head>
    <meta charset="utf-8"/>
    <title> <?php echo $__env->yieldContent('title'); ?> | Accueil</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
<!-- App favicon -->
    <link rel="shortcut icon" href="<?php echo e(URL::asset('assets/images/favicon.png')); ?>">
    <?php echo $__env->make('layouts.head-css', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo \Livewire\Livewire::styles(); ?>

</head>

<?php $__env->startSection('body'); ?>

<div class="modal fade update-profile" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myLargeModalLabel">Editer votre profile</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST" enctype="multipart/form-data" id="update-profile">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" value="<?php echo e(Auth::user()->id); ?>" id="data_id">
                    <div class="mb-3">
                        <label for="useremail" class="form-label">Email</label>
                        <input type="email" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="useremail" value="<?php echo e(Auth::user()->email); ?>" name="email" placeholder="Enter email" autofocus>
                        <div class="text-danger" id="emailError" data-ajax-feedback="email"></div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="username" class="form-label">Nom</label>
                        <input type="text" class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(Auth::user()->name); ?>" id="username" name="name" autofocus placeholder="Enter username">
                        <div class="text-danger" id="nameError" data-ajax-feedback="name"></div>
                    </div>
                    
                    <?php if(Auth::user()->role == 'transporteur'): ?>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Numéro de téléphone</label>
                            <input required 
                            type="text" class="form-control form-control-lg <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                value="<?php echo e(isset(Auth::user()->carrier->phone)?Auth::user()->carrier->phone:null); ?>"
                                id="phone" name="phone" placeholder="Entrez le numéro de téléphone du sous-traitant">
                            <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="invalid-feedback" role="alert">
                                <strong>Nom invalid</strong>
                            </span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label">Adresse</label>
                            <input required type="text" class="form-control form-control-lg <?php $__errorArgs = ['address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                value="<?php echo e(isset(Auth::user()->carrier->address)?Auth::user()->carrier->address:null); ?>"
                                id="address" name="address" placeholder="Entrez l'adresse du sous-traitant">
                            <?php $__errorArgs = ['address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="invalid-feedback" role="alert">
                                <strong>Nom invalid</strong>
                            </span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <?php endif; ?>

                    <div class="mb-3">
                        <label for="avatar">Photo de profile</label>
                        <div class="input-group">
                            <input type="file" class="form-control <?php $__errorArgs = ['avatar'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="avatar" name="avatar" autofocus>
                            <label class="input-group-text" for="avatar">Upload</label>
                        </div>
                        <div class="text-start mt-2">
                            <img src="<?php echo e(asset(Auth::user()->avatar)); ?>" alt="" class="rounded-circle avatar-lg">
                        </div>
                        <div class="text-danger" role="alert" id="avatarError" data-ajax-feedback="avatar"></div>
                    </div>
                    
                    <div class="mt-3 d-grid">
                        <button class="btn btn-primary waves-effect waves-light UpdateProfile" data-id="<?php echo e(Auth::user()->id); ?>" type="submit">Modifier</button>
                    </div>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>



    <body data-sidebar="dark">
    <?php echo $__env->yieldSection(); ?>
    <!-- Begin page -->
    <div id="layout-wrapper">
    <?php echo $__env->make('layouts.topbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('layouts.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    <?php echo $__env->yieldContent('content'); ?>
                </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->
            <?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
        <!-- end main content-->
    </div>
    <!-- END layout-wrapper -->

    <!-- JAVASCRIPT -->
    <?php echo $__env->make('layouts.vendor-scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <script>
        $('#search').click(function(e){
            window.location.href = "/search/"+ $('#search-input').val();
         });
    </script>
    <script>
        $('#search-input').on('keypress', function(e){
            if(e.which == 13){
                e.preventDefault();
                window.location.href = "/search/"+ e.target.value;
            }
         });
    </script>
    <?php echo \Livewire\Livewire::scripts(); ?>

    <?php echo $__env->yieldPushContent('script'); ?>
    </body>

</html>
<?php /**PATH D:\www\ismatech\safetyapp_web\resources\views/layouts/master.blade.php ENDPATH**/ ?>