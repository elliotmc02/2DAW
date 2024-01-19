<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Crear Tren</title>
</head>

<body>
    <a href="<?php echo e(route('trains.index')); ?>">Trenes</a>
    <a href="<?php echo e(route('train_types.index')); ?>">Tipos de trenes</a>
    <a href="<?php echo e(route('tickets.index')); ?>">Tickets</a>
    <a href="<?php echo e(route('ticket_types.index')); ?>">Tipos de tickets</a><br>
    <form action="<?php echo e(route('trains.store')); ?>" method="post">
        <?php echo csrf_field(); ?>
        <label>Nombre del tren</label>
        <input type="text" name="name"><br>
        <label>Pasajeros</label>
        <input type="text" name="passengers"><br>
        <label>Año</label>
        <input type="text" name="year"><br>
        <label>Tipo de tren</label>
        <select name="train_type_id">
            <?php $__currentLoopData = $train_types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($type->id); ?>"><?php echo e($type->type); ?>

                </option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select><br>
        <input type="submit" value="Crear">
    </form>
</body>

</html>
<?php /**PATH C:\Users\usuario\Documents\2DAW\Servidor\Laravel\trenes\resources\views/trains/create.blade.php ENDPATH**/ ?>