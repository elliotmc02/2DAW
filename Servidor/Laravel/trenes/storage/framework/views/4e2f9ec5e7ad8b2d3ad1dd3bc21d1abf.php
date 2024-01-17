<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editar tren</title>
</head>

<body>
    <form action="<?php echo e(route('trains.update', ['train' => $train->id])); ?>" method="post">
        <?php echo csrf_field(); ?>
        <?php echo e(method_field('PUT')); ?>

        <label>Nombre del tren</label>
        <input type="text" name="name" value="<?php echo e($train->name); ?>"><br>
        <label>Pasajeros</label>
        <input type="text" name="passengers" value="<?php echo e($train->passengers); ?>"><br>
        <label>Año</label>
        <input type="text" name="year" value="<?php echo e($train->year); ?>"><br>
        <label>Tipo de tren</label>
        <select name="type">
            <option selected hidden value="<?php echo e($train->train_type_id); ?>"><?php echo e($train->train_type->type); ?></option>
            <?php $__currentLoopData = $train_types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($type->id); ?>"><?php echo e($type->type); ?>

                </option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select><br>
        <input type="submit" value="Editar">
    </form>

</body>

</html>
<?php /**PATH C:\Users\Elliot\Documents\2DAW\Servidor\Laravel\trenes\resources\views/trains/edit.blade.php ENDPATH**/ ?>