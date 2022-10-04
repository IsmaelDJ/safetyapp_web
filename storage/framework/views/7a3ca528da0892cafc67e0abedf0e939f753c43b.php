<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th style="width: 50px; text-align:center;">N°</th>
                <th style="text-align: center">Nom</th>
                <th style="text-align: center">Phone</th>
                <th style="text-align: center">Adresse</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $carriers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $carrier): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td style="text-align: center"><?php echo e($carrier->number); ?></td>
                <td style="width: 250px; text-align: center"><?php echo e($carrier->name); ?></td>
                <td style="width: 250px; text-align: center"><?php echo e($carrier->phone); ?></td>
                <td style="width: 250px; text-align: center"><?php echo e($carrier->address); ?></td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</body>
</html><?php /**PATH C:\laragon\www\safetyapp_web\resources\views/carriers/export_xlsx.blade.php ENDPATH**/ ?>