<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nueva cancion</title>
</head>

<body>
    <form action="<?php echo e(route('canciones.store')); ?>" method="post">
        <?php echo csrf_field(); ?>
        <label>Titulo cancion</label>
        <input type="text" name="titulo_cancion">
        <label>Genero cancion</label>
        <input type="text" name="genero_cancion">
        <label>Duracion</label>
        <input type="text" name="duracion">
        <label>Artista</label>
        <select name="artista">
            <?php $__currentLoopData = $artistas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $artista): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($artista->id); ?>"><?php echo e($artista->nombre_artista); ?>

                </option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
        <input type="submit" value="Crear">
    </form>
</body>

</html>
<?php /**PATH C:\Users\usuario\Documents\2DAW\Servidor\Laravel\musica\resources\views/canciones/create.blade.php ENDPATH**/ ?>