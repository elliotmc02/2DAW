<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Canciones</title>
</head>

<body>
    <a href="<?php echo e(route('canciones.create')); ?>">Crear cancion</a>
    <table>
        <thead>
            <tr>
                <th>Nombre cancion</th>
                <th>Genero cancion</th>
                <th>Duracion</th>
                <th>Artista de la cancion</th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $canciones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cancion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($cancion->titulo_cancion); ?></td>
                    <td><?php echo e($cancion->genero_cancion); ?></td>
                    <td><?php echo e($cancion->duracion); ?></td>
                    <td><?php echo e($cancion->artista_cancion->nombre_artista); ?></td>
                    <td>
                        <form action="<?php echo e(route('canciones.show', ['cancion' => $cancion->id])); ?>" method="get">
                            <input type="submit" value="Ver">
                        </form>
                    </td>
                    <td>
                        <form action="<?php echo e(route('canciones.edit', ['cancion' => $cancion->id])); ?>" method="get">
                            <input type="submit" value="Editar">
                        </form>
                    </td>
                    <td>
                        <form action="<?php echo e(route('canciones.destroy', ['cancion' => $cancion->id])); ?>" method="post">
                            <?php echo csrf_field(); ?>
                            <?php echo e(method_field('DELETE')); ?>

                            <input type="submit" value="Borrar">
                        </form>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</body>

</html>
<?php /**PATH C:\Users\usuario\Documents\2DAW\Servidor\Laravel\musica\resources\views/canciones/index.blade.php ENDPATH**/ ?>