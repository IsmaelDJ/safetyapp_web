<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Liste of particulars</title>
</head>

<body>
    <table>
        <thead>
            <tr>
                <th class="align-middle">chauffeur</th>
                <th class="text text-center">Reponse Vraie</th>
                <th class="text text-center">Reponse Faux</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $drivers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $driver): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td>
                    <a href="<?php echo e(route('drivers.show',$driver->id)); ?>">
                        <p class="text-muted mb-0 text-justify"><?php echo e($driver->name); ?></p>
                    </a>
                </td>
                <td>
                    <div class="row">
                        <div class="col-auto">
                            <p class="text-muted mb-0 text-justify"><?php echo e($driver->correct_answers); ?></p>
                        </div>
                    </div>

                </td>
                <td>
                    <div class="row">
                        <div class="col-auto">
                            <p class="text-muted mb-0 text-justify"><?php echo e($driver->incorrect_answers); ?></p>
                        </div>
                    </div>

                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </tbody>
    </table>

</body>

</html><?php /**PATH D:\www\ismatech\safetyapp_web\resources\views/driver_quiz_responses/export_xlsx.blade.php ENDPATH**/ ?>