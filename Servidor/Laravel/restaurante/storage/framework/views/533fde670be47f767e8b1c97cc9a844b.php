<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>index carta</h1>
    <h2><?php echo e($mensaje); ?></h2>
    <h1>Platos</h1>
    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Unidad</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $platos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $plato): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($plato->nombre); ?></td>
                    <td><?php echo e($plato->precio); ?></td>
                    <td><?php echo e($plato->tipo); ?></td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
    <h1>Bebidas</h1>
    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Precio</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $bebidas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bebida): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($bebida->nombre); ?></td>
                    <td><?php echo e($bebida->precio); ?></td>
                    <td><?php echo e($bebida->tipo); ?></td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</body>

</html>
<?php /**PATH C:\Users\usuario\Documents\2DAW\Servidor\Laravel\restaurante\resources\views/carta/index.blade.php ENDPATH**/ ?>