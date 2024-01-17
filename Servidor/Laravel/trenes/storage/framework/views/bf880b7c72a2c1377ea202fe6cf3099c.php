<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editar ticket</title>
</head>

<body>
    <form action="<?php echo e(route('tickets.update', ['ticket' => $ticket->id])); ?>" method="post">
        <?php echo csrf_field(); ?>
        <?php echo e(method_field('PUT')); ?>

        <label>Fecha</label>
        <input type="text" name="date" value="<?php echo e($ticket->date); ?>"><br>
        <label>Precio</label>
        <input type="text" name="price" value="<?php echo e($ticket->price); ?>"><br>
        <label>Nombre del tren</label>
        <select name="train">
            <option selected hidden value="<?php echo e($ticket->train_id); ?>"><?php echo e($ticket->train->name); ?></option>
            <?php $__currentLoopData = $trains; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $train): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($train->id); ?>"><?php echo e($train->name); ?>

                </option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select><br>
        <label>Tipo de ticket</label>
        <select name="type">
            <option selected hidden value="<?php echo e($ticket->ticket_type_id); ?>"><?php echo e($ticket->ticket_type->type); ?></option>
            <?php $__currentLoopData = $ticket_types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($type->id); ?>"><?php echo e($type->type); ?>

                </option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select><br>
        <input type="submit" value="Editar">
    </form>

</body>

</html>
<?php /**PATH C:\Users\Elliot\Documents\2DAW\Servidor\Laravel\trenes\resources\views/tickets/edit.blade.php ENDPATH**/ ?>