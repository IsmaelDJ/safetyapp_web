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
            <th style="text-align: center">N°</th>
            <th style="text-align: center">Nom</th>
            <th style="text-align: center">Numéro de téléphone</th>
            <th style="text-align: center">Clé OBC</th>
            <th style="text-align: center">Mot de passe</th>
        </tr>
        </thead>
        <tbody>
        <?php $__currentLoopData = $drivers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $driver): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td style="width: 50px; text-align: center">
                    <p><?php echo e($loop->iteration); ?></p>
                </td>
                <td style="width: 200px; text-align: center">
                    <p><?php echo e($driver->name); ?></p>
                </td>
                <td style="width: 200px; text-align: center">
                    <p><?php echo e($driver->phone); ?></p>
                </td>
                <td style="width: 200px; text-align: center">
                    <p><?php echo e($driver->obc); ?></p>
                </td>
                <td style="width: 200px; text-align: center">
                    <p><?php echo e($driver->password); ?></p>
                </td>

            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </tbody>
    </table>

</body>
</html><?php /**PATH C:\laragon\www\safetyapp_web\resources\views/drivers/export_xlsx.blade.php ENDPATH**/ ?>