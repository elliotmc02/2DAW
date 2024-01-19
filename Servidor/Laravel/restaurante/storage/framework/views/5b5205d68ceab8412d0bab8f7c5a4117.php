<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>index bebidas</h1>
    <h2><?php echo e($mensaje); ?></h2>
    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Tipo</th>
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
<?php /**PATH C:\Users\usuario\Documents\2DAW\Servidor\Laravel\restaurante\resources\views/bebidas/index.blade.php ENDPATH**/ ?>