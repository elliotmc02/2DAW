<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tipos de tickets</title>
</head>

<body>
    <h1>Todos los tipos de tickets</h1>
    <a href="<?php echo e(route('trains.index')); ?>">Trenes</a>
    <a href="<?php echo e(route('train_types.index')); ?>">Tipos de trenes</a>
    <a href="<?php echo e(route('tickets.index')); ?>">Tickets</a>
    <a href="<?php echo e(route('ticket_types.index')); ?>">Tipos de tickets</a><br>
    <a href="<?php echo e(route('ticket_types.create')); ?>">Crear tipo de ticket</a>
    <table>
        <thead>
            <tr>
                <th>Tipo</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $ticket_types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($type->type); ?></td>
                    <td>
                        <form action="<?php echo e(route('ticket_types.show', ['ticket_type' => $type->id])); ?>">
                            <input type="submit" value="Ver">
                        </form>
                    </td>
                    <td>
                        <form action="<?php echo e(route('ticket_types.edit', ['ticket_type' => $type->id])); ?>" method="get">
                            <input type="submit" value="Editar">
                        </form>
                    </td>
                    <td>
                        <form action="<?php echo e(route('ticket_types.destroy', ['ticket_type' => $type->id])); ?>" method="post">
                            <?php echo csrf_field(); ?>
                            <?php echo e(method_field('DELETE')); ?>

                            <input type="submit" value="Borrar">
                        </form>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</body>

</html>
<?php /**PATH C:\Users\Elliot\Documents\2DAW\Servidor\Laravel\trenes\resources\views/ticket_types/index.blade.php ENDPATH**/ ?>