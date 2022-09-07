

<?php $__env->startSection('title'); ?> <?php echo app('translator')->get('translation.Starter_Page'); ?> <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
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
                                    <h5 class="mb-1" id="username"><?php echo e(Auth::user()->name ? Auth::user()->name : "Nom et Prénom"); ?></h5>
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
                                <a style="width: 6rem"  href="" class="btn btn-primary waves-effect waves-light btn-sm" data-bs-toggle="modal" data-bs-target=".update-profile">
                                    <i class="fa fa-edit"></i> Editer
                                </a>
                            </div>
                        </div>
                        <div class="clearfix mt-4 mt-lg-0">
                            <div class="dropdown float-end">
                                <a style="width: 6rem; margin-top:5%;"  href="<?php echo e(route('analyze.index')); ?>" class="btn btn-primary waves-effect waves-light btn-sm">
                                    <i class="fa fa-eye"></i> Voir Plus
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end row -->
                
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
                
                
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xl-8">
        <div class="row">
            
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <div class="clearfix">
                            <div class="float-end">
                                <div class="input-group input-group-sm">
                                    <select id="select-month" class="form-select form-select-sm">
                                        <?php $__currentLoopData = $months; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $month): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($loop->iteration == $current_month): ?>
                                        <option value="<?php echo e($loop->iteration); ?>" selected> 
                                            <a href="?month=<?php echo e($loop->iteration); ?>"> <?php echo e($month); ?></a>
                                        </option>
                                        <?php else: ?>
                                        <option value="<?php echo e($loop->iteration); ?>">
                                            <a href="?month=<?php echo e($loop->iteration); ?>"> <?php echo e($month); ?></a>
                                        </option>
                                        <?php endif; ?>
                                        
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <label class="input-group-text">Mois</label>
                                </div>
                            </div>
                            <h4 class="card-title mb-4">Présence</h4>
                        </div>
                        
                        <div class="row">
                            <div>
                                <?php echo $presenceChart->container(); ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Quiz</h4>
                
                <ul class="nav nav-pills bg-light rounded" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-bs-toggle="tab" href="#transactions-sell-tab" role="tab">Correcte</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#transactions-buy-tab" role="tab">Faux</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#transactions-all-tab" role="tab">Attente</a>
                    </li>
                </ul>
                <div class="tab-content mt-4">
                    <div class="tab-pane active" id="transactions-all-tab" role="tabpanel">
                        <div class="table-responsive" data-simplebar style="max-height: 340px;">
                            <table class="table align-middle table-nowrap">
                                <tbody>
                                    <?php $__currentLoopData = $quizNoAnswereds; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $quizNoAnswered): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td style="width: 50px;">
                                            <div class="font-size-22 text-primary">
                                                <img src="<?php echo e(isset($quizNoAnswered->image) ? asset($quizNoAnswered->image) : asset('/assets/images/users/avatar-1.jpg')); ?>" alt="" class="avatar-sm rounded-circle img-thumbnail">
                                            </div>
                                        </td>
                                        
                                        <td>
                                            <div>
                                                <h5 class="font-size-14 mb-1"><?php echo e($quizNoAnswered->description); ?></h5>
                                            </div>
                                        </td>
                                        
                                        <td>
                                            <div class="text-end">
                                                <a type="button" href="<?php echo e(route('categories.show', $quizNoAnswered->category)); ?>"
                                                    class="btn btn-success btn-rounded waves-effect waves-light "><i
                                                    class="mdi mdi-tag me-1"></i> <?php echo e($quizNoAnswered->category->name); ?>

                                                </a>                                             
                                            </div>
                                        </td>
                                        
                                        <td>
                                            <div class="text-end">
                                                <h5 class="font-size-14 text-muted mb-0">0 %</h5>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane" id="transactions-buy-tab" role="tabpanel">
                        <div class="table-responsive" data-simplebar style="max-height: 260px;">
                            <table class="table align-middle table-nowrap">
                                <tbody>
                                    <?php $__currentLoopData = $quizBadAnswereds; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $quizBadAnswered): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td style="width: 50px;">
                                            <div class="font-size-22 text-primary">
                                                <img src="<?php echo e(isset($quizBadAnswered->image) ? asset($quizBadAnswered->image) : asset('/assets/images/users/avatar-1.jpg')); ?>" alt="" class="avatar-sm rounded-circle img-thumbnail">
                                            </div>
                                        </td>
                                        
                                        <td>
                                            <div>
                                                <h5 class="font-size-14 mb-1"><?php echo e($quizBadAnswered->description); ?></h5>
                                            </div>
                                        </td>
                                        
                                        <td>
                                            <div class="text-end">
                                                <a type="button" href="<?php echo e(route('categories.show', $quizBadAnswered->category)); ?>"
                                                    class="btn btn-success btn-rounded waves-effect waves-light "><i
                                                    class="mdi mdi-tag me-1"></i> <?php echo e($quizBadAnswered->category->name); ?>

                                                </a>                                            
                                            </div>
                                        </td>
                                        
                                        <td>
                                            <div class="text-end">
                                                <h5 class="font-size-14 text-muted mb-0"><?php echo e(round( $employee_quiz_responses_total != 0 ? $quizBadAnswered->employee_quiz_responses_count / $employee_quiz_responses_total * 100 : 0, 1)); ?>%</h5>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    
                    <div class="tab-pane" id="transactions-sell-tab" role="tabpanel">
                        <div class="table-responsive" data-simplebar style="max-height: 260px;">
                            <table class="table align-middle table-nowrap">
                                <tbody>
                                    <?php $__currentLoopData = $quizGoodAnswereds; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $quizGoodAnswered): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td style="width: 50px;">
                                            <div class="font-size-22 text-primary">
                                                <img src="<?php echo e(isset($quizGoodAnswered->image) ? asset($quizGoodAnswered->image) : asset('/assets/images/users/avatar-1.jpg')); ?>" alt="" class="avatar-sm rounded-circle img-thumbnail">
                                            </div>
                                        </td>
                                        
                                        <td>
                                            <div>
                                                <h5 class="font-size-14 mb-1"><?php echo e($quizGoodAnswered->description); ?></h5>
                                            </div>
                                        </td>
                                        
                                        <td>
                                            <div class="text-end">
                                                <a type="button" href="<?php echo e(route('categories.show', $quizGoodAnswered->category)); ?>"
                                                    class="btn btn-success btn-rounded waves-effect waves-light "><i
                                                    class="mdi mdi-tag me-1"></i> <?php echo e($quizGoodAnswered->category->name); ?>

                                                </a>
                                            </div>
                                        </td>
                                        
                                        <td>
                                            <div class="text-end">
                                                <h5 class="font-size-14 text-muted mb-0"><?php echo e(round($employee_quiz_responses_total != 0 ? $quizGoodAnswered->employee_quiz_responses_count / $employee_quiz_responses_total * 100 : 0, 1)); ?>%</h5>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>  

<div class="row">
    <div class="col-xl-4">
        <div class="card">
            <div class="card-body">
                <div class="d-flex flex-wrap align-items-start">
                    <div class="me-2">
                        <h5 class="card-title mb-3">Lecture par règle</h5>
                    </div>
                </div>
                
                <hr>
                
                <div  data-simplebar style="max-height: 260px;">
                    <ul class="list-group list-group-flush">
                        <?php $__currentLoopData = $rulesMoreRead; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ruleMoreRead): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li class="list-group-item">
                            <div class="py-2">
                                <h5 class="font-size-14"><?php echo e($ruleMoreRead->description); ?><span class="float-end"><?php echo e((round($total_readings != 0 ? $ruleMoreRead->readings_count * 100 / $total_readings : 0 , 1)). '%'); ?></span></h5>
                                <div class="progress animated-progess progress-sm">
                                    <div class="progress-bar" role="progressbar" style="width: <?php echo e(round( $total_readings != 0 ? $ruleMoreRead->readings_count * 100 / $total_readings : 0, 1)); ?>%" aria-valuenow="<?php echo e(round($total_readings != 0 ? $ruleMoreRead->readings_count * 100 / $total_readings : 0, 1)); ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-xl-4">
        <div class="card">
            <div class="card-body">
                <div class="d-flex flex-wrap align-items-start">
                    <div class="me-2">
                        <h5 class="card-title mb-3">Lecture par catégorie de règle</h5>
                    </div>
                </div>
                
                <hr>
                <div data-simplebar style="max-height: 260px;">
                    <div class="row w-100 mb-4">
                        <div class="col-4 font-size-14">
                            <?php $__currentLoopData = $categoriesMoreRead; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categoryMoreRead): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="mt-1 mb-1 text text-end">
                                <a type="button" href="<?php echo e(route('categories.show', $categoryMoreRead)); ?>"
                                class="btn btn-success btn-sm btn-rounded waves-effect waves-light "><i
                                class="mdi mdi-tag me-1"></i> <?php echo e($categoryMoreRead->name); ?>

                            </a>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <div class="col-8">
                        <div class="smart-progress">
                            <?php $__currentLoopData = $categoriesMoreRead; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categoryMoreRead): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="progress-outer mt-1">
                                <div class="progress animated-progess bg-white">
                                    <div class="progress-bar bg-success progress-bar-info" style="width:<?php echo e($total_readings != 0 ? $categoryMoreRead->readings_count * 100 / $total_readings : 0); ?>%;"></div>
                                    <div class="progress-value"><?php echo e(round($total_readings != 0 ? $categoryMoreRead->readings_count * 100 / $total_readings : 0, 1)); ?>%</div>
                                </div>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-xl-4">
    <div class="card">
        <div class="card-body">
            <div class="d-flex flex-wrap align-items-start">
                <div class="me-2">
                    <h5 class="card-title mb-3">Lecture par employé</h5>
                </div>
            </div>
            
            <hr>
            
            <div class="table-responsive" data-simplebar style="max-height: 260px;">
                <table class="table align-middle table-nowrap">
                    <tbody>
                        <?php $__currentLoopData = $bestEmployees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bestEmployee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td>
                                <div>
                                    <h5 class="font-size-14 mb-1"><?php echo e($bestEmployee->employee->name); ?></h5>
                                </div>
                            </td>
                            
                            <td>
                                <div>
                                    <h5 class="font-size-14 mb-1"><?php echo e($bestEmployee->employee->phone); ?></h5>
                                </div>
                            </td>
                            
                            <td>
                                <div class="text-end">
                                    <h5 class="font-size-14 text-muted mb-0"><?php echo e(round( $total_readings != 0 ? $bestEmployee->readings_count / $total_readings * 100 : 0, 1)); ?>%</h5>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<?php echo $presenceChart->script(); ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/highcharts/6.0.6/highcharts.js" charset="utf-8"></script>
<script src="<?php echo e(URL::asset('/assets/js/pages/jquery-knob.init.js')); ?>"></script>
<script src="<?php echo e(URL::asset('/assets/js/pages/saas-dashboard.init.js')); ?>"></script>
<script src="<?php echo e(URL::asset('assets/js/essential_audio.js')); ?>"></script>
<script>
    $('#update-profile').on('submit', function(event) {
        event.preventDefault();
        var Id = $('#data_id').val();
        let formData = new FormData(this);
        $('#emailError').text('');
        $('#nameError').text('');
        $('#avatarError').text('');
        $.ajax({
            url: "<?php echo e(url('update-profile')); ?>" + "/" + Id,
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                $('#emailError').text('');
                $('#nameError').text('');
                $('#avatarError').text('');
                if (response.isSuccess == false) {
                    alert(response.Message);
                } else if (response.isSuccess == true) {
                    setTimeout(function() {
                        window.location.reload();
                    }, 1000);
                }
            },
            error: function(response) {
                $('#emailError').text(response.responseJSON.errors.email);
                $('#nameError').text(response.responseJSON.errors.name);
                $('#avatarError').text(response.responseJSON.errors.avatar);
            }
        });
    });
</script>
<script>
    $('#select-month').change(function(e){
        window.location.href = "?month="+ e.target.value;
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Ismae\Downloads\safetyapp_web\resources\views/index.blade.php ENDPATH**/ ?>