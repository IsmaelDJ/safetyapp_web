<?php $__env->startSection('title'); ?> Reponses <?php $__env->stopSection(); ?>

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
        <div class="col-xl-4 p-2">
            <form action="<?php echo e(route('employee_quiz_responses.update',$employeeQuizResponse)); ?>" method="post" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                
                <label class="col-md-2 col-form-label">Utilisateur</label>
                <div class="mb-4">
                    <select
                        class="form-select form-select-lg <?php $__errorArgs = ['employee_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                        name="employee_id">
                        <?php $__currentLoopData = $employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($employee->id == $employeeQuizResponse->employee_id): ?>
                                <option selected value="<?php echo e($employee->id); ?>">
                                    <?php echo e($employee->name); ?>

                                </option>
                            <?php else: ?>
                                <option value="<?php echo e($employee->id); ?>">
                                    <?php echo e($employee->name); ?>

                                </option>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    <?php $__errorArgs = ['employee_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span class="invalid-feedback" role="alert">
                        <strong>Utilisateur non selectionnée</strong>
                    </span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
            
                <label class="col-md-2 col-form-label">Quiz</label>
                <div class="mb-4">
                    <select
                        class="form-select form-select-lg <?php $__errorArgs = ['quiz_question_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                        name="quiz_question_id">
                        <?php $__currentLoopData = $quizQuestions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $quizQuestion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($quizQuestion->id == $employeeQuizResponse->quiz_question_id): ?>
                            <option selected value="<?php echo e($quizQuestion->id); ?>">
                                <?php echo e($quizQuestion->description); ?>

                            </option>
                            <?php else: ?>
                            <option value="<?php echo e($quizQuestion->id); ?>">
                                <?php echo e($quizQuestion->description); ?>

                            </option>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    <?php $__errorArgs = ['quiz_question_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span class="invalid-feedback" role="alert">
                        <strong>Quiz non selectionnée</strong>
                    </span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
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
                        <?php if($employeeQuizResponse->correct): ?>
                        <option value="true" selected>
                            Vrai
                        </option>
                        <option value="false">
                            Faux
                        </option>
                        <?php else: ?>
                        <option value="true">
                            Vrai
                        </option>
                        <option value="false" selected>
                            Faux
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
                <div class="mt-3">
                    <button type="submit" class="btn btn-primary w-md">Enregistrer</button>
                </div>
           
                <input type="hidden" name="_method" value="put">
            </form>
        </div>
        <div class="col-xl-8">
            <div class="auth-full-bg pt-lg-5 p-4">
                <div class="w-100">
                </div>
            </div>
        </div>
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

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Ismae\Downloads\safetyapp_web-master\safetyapp_web-master\resources\views/employee_quiz_responses/edit.blade.php ENDPATH**/ ?>