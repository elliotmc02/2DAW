<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nuevo plato</title>
</head>

<body>
    <form action="<?php echo e(route('platos.store')); ?>" method="post">
        <?php echo csrf_field(); ?>
        <label>Nombre</label>
        <input type="text" name="nombre">
        <label>Precio</label>
        <input type="text" name="precio">
        <label>Tipo</label>
        <select name="tipo">
            <option value="1">Racion</option>
            <option value="2">Media racion</option>
            <option value="3">Tapa</option>
        </select>
        <input type="submit" value="Crear">
    </form>
</body>

</html>
<?php /**PATH C:\Users\usuario\Documents\2DAW\Servidor\Laravel\restaurante\resources\views/platos/create.blade.php ENDPATH**/ ?>