<?php $__env->startSection('title'); ?> Questions <?php $__env->stopSection(); ?>

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

    <div class="card">

        <div class="row g-0">
            <form action="<?php echo e(route('quiz_questions.update',$quizQuestion)); ?>" method="post" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>

                <div class="row">


                    <div class="col-md-5 col-xl-4">
                        <div class="auth-full-page-content p-md-5 p-4">
                            <div class="w-100">

                                <div class="mb-3">
                                    <div>
                                        <label for="image" class="form-label">Image</label>
                                    </div>

                                    <img id="ruleImage" class="img-fluid mb-1"
                                         src="<?php echo e(URL::asset($quizQuestion->image)); ?>">

                                    <input class=" form-control form-control-lg <?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                           id="image"
                                           name="image" type="file" onchange="PreviewImage();">
                                    <?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback" role="alert">
                                    <strong>Image invalide</strong>
                                </span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-7 col-xl-7">
                        <div class="bg-soft pt-lg-5 p-4 col-md-10">
                            <div class="w-100">
                                <div class="w-100">
                                    <label class="col-form-label">Catégorie</label>
                                    <div>
                                        <select
                                            class="form-select form-select-lg <?php $__errorArgs = ['category_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                            name="category_id">
                                            
                                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if( $quizQuestion->category_id == $category->id): ?>
                                                <option selected value="<?php echo e($category->id); ?>">
                                                    <img src="<?php echo e(URL::asset($category->image)); ?>" alt="">
                                                    <?php echo e($category->name); ?>

                                                </option>
                                                <?php else: ?>
                                                <option value="<?php echo e($category->id); ?>">
                                                    <img src="<?php echo e(URL::asset($category->image)); ?>" alt="">
                                                    <?php echo e($category->name); ?>

                                                </option>
                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                        <?php $__errorArgs = ['category_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="invalid-feedback" role="alert">
                                            <strong>Catégorie non selectionnée</strong>
                                        </span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                               
                                <div class="w-100">
                                    <label class="col-form-label">Réponse</label>
                                    <div>
                                        <select
                                            class="form-select form-select-lg <?php $__errorArgs = ['correct'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                            name="correct">
                                            <?php if($quizQuestion->correct): ?>
    
                                                <option value="true" selected>
                                                    Reponse correcte
                                                </option>
                                                <option value="false">
                                                    Reponse incorrecte
                                                </option>
                                            <?php else: ?>
    
                                                <option value="true">
                                                    Reponse correcte
                                                </option>
                                                <option value="false" selected>
                                                    Reponse incorrecte
                                                </option>
                                            <?php endif; ?>
                                        </select>
                                        <?php $__errorArgs = ['correct'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="invalid-feedback" role="alert">
                                            <strong>Valeur de reponse non selectionnée</strong>
                                        </span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>

                                <div class="mb-3 mt-3">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea id="" description placeholder="Entrez la question"
                                              name="description"
                                              class="form-control form-control-lg <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"><?php echo e($quizQuestion->description); ?></textarea>
                                    <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback" role="alert">
                                    <strong>Question invalid</strong>
                                </span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>

                                <div class="mt-5">
                                    <div class="mb-3">
                                        <label for="fr" class="form-label">Audio Français</label>
                                        <div class="essential_audio mt-4 mb-4"
                                             data-url="<?php echo e(URL::asset($quizQuestion->ng)); ?>"></div>
                                        <input class="form-control form-control-lg <?php $__errorArgs = ['fr'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                               id="fr"
                                               value="<?php echo e(old('fr')); ?>"
                                               name="fr" type="file">
                                        <?php $__errorArgs = ['fr'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="invalid-feedback" role="alert">
                                    <strong>Audio invalide</strong>
                                </span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>


                                    <div class="mb-3">
                                        <label for="ar" class="form-label">Audio Arabe</label>
                                        <div class="essential_audio mt-4 mb-4"
                                             data-url="<?php echo e(URL::asset($quizQuestion->ng)); ?>"></div>
                                        <input class="form-control form-control-lg <?php $__errorArgs = ['ar'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                               id="ar"
                                               value="<?php echo e(old('ar')); ?>"
                                               name="ar" type="file">
                                        <?php $__errorArgs = ['ar'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="invalid-feedback" role="alert">
                                    <strong>Audio invalide</strong>
                                </span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>

                                    <div class="mb-3">
                                        <label for="ng" class="form-label">Audio Ngambaye</label>
                                        <div class="essential_audio mt-4 mb-4"
                                             data-url="<?php echo e(URL::asset($quizQuestion->ng)); ?>"></div>
                                        <input class="form-control form-control-lg <?php $__errorArgs = ['ng'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                               id="ng"
                                               value="<?php echo e(old('ng')); ?>"
                                               name="ng" type="file">
                                        <?php $__errorArgs = ['ng'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="invalid-feedback" role="alert">
                                    <strong>Audio invalide</strong>
                                </span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>

                                <div>
                                    <button type="submit" class="btn btn-primary w-md">Enregistrer</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <input type="hidden" name="_method" value="put">

            </form>
        </div>
        <!-- end row -->
    </div>


<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script>
        function PreviewImage() {
            var oFReader = new FileReader();
            oFReader.readAsDataURL(document.getElementById("image").files[0]);

            oFReader.onload = function (oFREvent) {
                document.getElementById("ruleImage").src = oFREvent.target.result;
            };
        };
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Ismae\Downloads\safetyapp_web-master\safetyapp_web-master\resources\views/quiz_questions/edit.blade.php ENDPATH**/ ?>