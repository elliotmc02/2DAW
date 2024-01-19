<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editar plato</title>
</head>

<body>
    <form action="<?php echo e(route('platos.update', ['plato' => $plato->id])); ?>" method="post">
        <?php echo csrf_field(); ?>
        <?php echo e(method_field('PUT')); ?>

        <label>Nombre</label>
        <input type="text" name="nombre" value="<?php echo e($plato->nombre); ?>">
        <label>Precio</label>
        <input type="text" name="precio" value="<?php echo e($plato->precio); ?>">
        <label>Tipo</label>
        <select name="tipo">
            <option selected hidden value="<?php echo e($plato->tipo_plato->tipo); ?>"><?php echo e($plato->tipo_plato->tipo); ?></option>
            <option value="1">Racion</option>
            <option value="2">Media racion</option>
            <option value="3">Tapa</option>
        </select>
        <input type="submit" value="Editar">
    </form>
</body>

</html>
<?php /**PATH C:\Users\usuario\Documents\2DAW\Servidor\Laravel\restaurante\resources\views/platos/edit.blade.php ENDPATH**/ ?>