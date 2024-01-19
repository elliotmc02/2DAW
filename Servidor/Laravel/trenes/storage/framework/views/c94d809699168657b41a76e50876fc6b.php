<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ticket</title>
</head>
<body>
    <h1>Mi ticket</h1>
    <a href="<?php echo e(route('trains.index')); ?>">Trenes</a>
    <a href="<?php echo e(route('train_types.index')); ?>">Tipos de trenes</a>
    <a href="<?php echo e(route('tickets.index')); ?>">Tickets</a>
    <a href="<?php echo e(route('ticket_types.index')); ?>">Tipos de tickets</a><br>
    <table>
        <thead>
            <tr>
                <th>Fecha</th>
                <th>Precio</th>
                <th>Nombre del tren</th>
                <th>Tipo de ticket</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?php echo e($ticket->date); ?></td>
                <td><?php echo e($ticket->price); ?></td>
                <td><?php echo e($ticket->train->name); ?></td>
                <td><?php echo e($ticket->ticket_type->type); ?></td>
            </tr>
        </tbody>
    </table>

</body>
</html><?php /**PATH C:\Users\usuario\Documents\2DAW\Servidor\Laravel\trenes\resources\views/tickets/show.blade.php ENDPATH**/ ?>