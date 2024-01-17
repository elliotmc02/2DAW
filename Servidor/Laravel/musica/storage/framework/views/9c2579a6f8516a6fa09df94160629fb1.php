<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Artistas</title>
</head>

<body>
    <table>
        <thead>
            <tr>
                <th>Nombre artista</th>
                <th>Genero artista</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $artistas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $artista): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($artista->nombre_artista); ?></td>
                    <td><?php echo e($artista->genero_artista); ?></td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</body>

</html>
<?php /**PATH C:\Users\usuario\Documents\2DAW\Servidor\Laravel\musica\resources\views/artistas/index.blade.php ENDPATH**/ ?>