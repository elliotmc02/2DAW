<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Mi plato</h1>
    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Tipo</th>
            </tr>
        </thead>
        <tbody>
                <tr>
                    <td><?php echo e($plato->nombre); ?></td>
                    <td><?php echo e($plato->precio); ?></td>
                    <td><?php echo e($plato->tipo); ?></td>
                </tr>
        </tbody>
    </table>
</body>

</html>
<?php /**PATH C:\Users\usuario\Documents\2DAW\Servidor\Laravel\restaurante\resources\views/platos/show.blade.php ENDPATH**/ ?>