<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Crear tipo de tren</title>
</head>

<body>
    <a href="<?php echo e(route('trains.index')); ?>">Trenes</a>
    <a href="<?php echo e(route('train_types.index')); ?>">Tipos de trenes</a>
    <a href="<?php echo e(route('tickets.index')); ?>">Tickets</a>
    <a href="<?php echo e(route('ticket_types.index')); ?>">Tipos de tickets</a><br>
    <form action="<?php echo e(route('train_types.store')); ?>" method="post">
        <?php echo csrf_field(); ?>
        <label>Tipo de tren</label>
        <input type="text" name="type"><br>
        <input type="submit" value="Crear">
    </form>

</body>

</html>
<?php /**PATH C:\Users\usuario\Documents\2DAW\Servidor\Laravel\trenes\resources\views/train_types/create.blade.php ENDPATH**/ ?>