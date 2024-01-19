<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tipos platos</title>
</head>

<body>
    <h1>Tipos de platos</h1>
    <ul>
        <?php $__currentLoopData = $tipos_platos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tipo_plato): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li><?php echo e($tipo_plato->tipo); ?></li>
            <ul>
                <?php
                    $platos = $tipo_plato->platos;
                ?>
                <?php $__currentLoopData = $platos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $plato): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($plato->nombre); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
</body>

</html>
<?php /**PATH C:\Users\usuario\Documents\2DAW\Servidor\Laravel\restaurante\resources\views/tipos_platos/index.blade.php ENDPATH**/ ?>