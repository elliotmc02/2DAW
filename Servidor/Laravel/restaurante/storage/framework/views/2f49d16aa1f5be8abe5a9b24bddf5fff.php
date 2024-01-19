<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editar bebida</title>
</head>

<body>
    <form action="<?php echo e(route('bebidas.update', ['bebida' => $bebida->id])); ?>" method="post">
        <?php echo csrf_field(); ?>
        <?php echo e(method_field('PUT')); ?>

        <label>Nombre</label>
        <input type="text" name="nombre" value="<?php echo e($bebida->nombre); ?>">
        <label>Precio</label>
        <input type="text" name="precio" value="<?php echo e($bebida->precio); ?>">
        <label>Tipo</label>
        <select name="tipo">
            <option value="<?php echo e($bebida->tipo); ?>" selected hidden><?php echo e($bebida->tipo); ?></option>
            <option value="Energetica">Energetica</option>
            <option value="Refresco">Refresco</option>
            <option value="Alcohol">Alcohol</option>
        </select>
        <input type="submit" value="Editar">
    </form>
</body>

</html>
<?php /**PATH C:\Users\usuario\Documents\2DAW\Servidor\Laravel\restaurante\resources\views/bebidas/edit.blade.php ENDPATH**/ ?>