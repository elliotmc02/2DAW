<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editar tipo de tren</title>
</head>

<body>
    <form action="<?php echo e(route('train_types.update', ['train_type' => $train_type->id])); ?>" method="post">
        <?php echo csrf_field(); ?>
        <?php echo e(method_field('PUT')); ?>

        <label>Tipo de tren</label>
        <input type="text" name="type" value="<?php echo e($train_type->type); ?>"><br>
        <input type="submit" value="Editar">
    </form>

</body>

</html>
<?php /**PATH C:\Users\usuario\Documents\2DAW\Servidor\Laravel\trenes\resources\views/train_types/edit.blade.php ENDPATH**/ ?>