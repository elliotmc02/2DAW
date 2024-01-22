<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tren</title>
</head>
<body>
    <h1>Mi tren</h1>
    <a href="<?php echo e(route('trains.index')); ?>">Trenes</a>
    <a href="<?php echo e(route('train_types.index')); ?>">Tipos de trenes</a>
    <a href="<?php echo e(route('tickets.index')); ?>">Tickets</a>
    <a href="<?php echo e(route('ticket_types.index')); ?>">Tipos de tickets</a><br>
    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Pasajeros</th>
                <th>Año</th>
                <th>Tipo de tren</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?php echo e($train->name); ?></td>
                <td><?php echo e($train->passengers); ?></td>
                <td><?php echo e($train->year); ?></td>
                <td><?php echo e($train->train_type->type); ?></td>
            </tr>
        </tbody>
    </table>

</body>
</html><?php /**PATH C:\Users\Elliot\Documents\2DAW\Servidor\Laravel\trenes\resources\views/trains/show.blade.php ENDPATH**/ ?>